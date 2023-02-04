<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\RentLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{


    //  View

    public function index()
    {
        $users = User::count();
        $category = Category::count();
        $rent_logs = RentLogs::count();
        $date = Date('d-m-Y');
        $rentlogs = RentLogs::with(['user', 'category'])->get();

        return view('dashboard.layouts.main', ['users' => $users, 'category' => $category, 'rent_logs' => $rent_logs, 'date' => $date,'rentlogs' => $rentlogs]);
    }

    public function viewCategory()
    {
        $category = Category::all();
        return view('dashboard.dashboard', ['category' => $category]);
    }

    public function viewRental()
    {

        $category = Category::all();
        $user = User::where("role_id", "!=", 1)->get();
        return view('dashboard.rent', ["category" => $category, "user" => $user]);
    }




    // Logic


    public function user_list()
    {

        $users = User::all();
        return view('dashboard.dashboard', ['users' => $users]);
    }

    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Session::flash('username', $request->username);
        Session::flash('kelas', $request->kelas);
        Session::flash('NoHp', $request->NoHp);
        Session::flash('alamat', $request->alamat);

        $request->validate(
            [
                'username' => 'required|string|unique:users,username',
                'password' => 'required',
                'kelas' => 'required',
                'NoHp'  => 'required|unique:users,NoHp|integer|min:12',
                'alamat'    => 'required',
            ],
            [
                'username.required' => 'Username wajib di isi',
                'username.unique' => 'Username sudah di gunakan',
                'password.required' => 'Password wajib di isi',
                'kelas.required' => 'Kelas wajib di isi',
                'NoHp.required' => 'Nomer hp wajib di isi',
                'NoHp.unique' => 'Nomer hp sudah di gunakan',
                'NoHp.min' => 'Nomer hp minimal 12 digit',
                'NoHp.integer' => 'Nomer hp harus angka',
                'alamat.required' => 'Alamat harus di isi',
            ]
        );

        $request['password'] = Hash::make($request->password);

        User::create($request->all());

        return redirect('/dashboard/user-list')->with('tambah', "Berhasil menambah data dengan nama $request->username");
    }





    public function destroy($id)
    {
        User::where('slug', $id)->delete($id);
        return redirect('/dashboard/user-list')->with('success', "Berhasil menghapus data dengan nama $id");
    }


    public function logout(Request $request)
    {
        Session::flush();
        $request->session()->flush();
        Auth::logout();
        return redirect('/auth');
    }


    // Logic insert data logs rental laptop
    public function storeLogs(Request $request)
    {

        $request['rent_date'] = Carbon::now()->toTimeString();
        $request['return_date'] = Carbon::now()->addHour(6)->toString();


        $laptop = Category::find($request->category_id)->only("status");

        if ($laptop['status'] != 'ready') {
            dd("Buku sedang di pinjam");
            Session::flash('error', "gagal meminjam laptop");
            return redirect('/');
        } else {

            // dd($request->all());
            try {
                DB::beginTransaction();
                // dd($request->all());

                RentLogs::create($request->all());
                // Update data
                $laptops = Category::find($request->category_id);
                $laptops['status'] = "dipinjam";
                $laptops->save();
                DB::commit();
                Session::flash('succes', "Berhasil meminjam laptop");
                return redirect('/dashboard/rent');

                // Insert data
            } catch (\Throwable $th) {
                dd($th);
                Session::flash('error', "gagal meminjam laptop");
                DB::rollBack();
                return redirect('/dashboard');
            }
        }
    }


}

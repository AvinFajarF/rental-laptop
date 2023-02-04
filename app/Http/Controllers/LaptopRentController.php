<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use App\Models\RentLogs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LaptopRentController extends Controller
{

    public function index()
    {
        $tester = Category::all();
        $user = User::where("role_id", "!=", 1)->get();
        return view('dashboard.rent', ['user' => $user,'category' => $tester]);
    }

    // Logic insert data logs rental laptop
    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toTimeString();
        $request['return_date'] = Carbon::now()->addHour(6)->toTimeString();



        $laptop_status = Category::find($request->category_id)->only("status");
        $user_status   = User::find($request->user_id)->only('status');

        if ($laptop_status['status'] != 'ready' ) {
            dd("Laptop sedang di pinjam");
            Session::flash('error', "gagal meminjam laptop");
            return redirect('/');
        }elseif($user_status['status'] != ""){
            dd("kamu sudah meminjam lebih dari satu!!!");
            Session::flash('error', "gagal meminjam laptop");
            return redirect('/');
        }else {
            /*
                Mengecek apakah user sudah meminjam laptop atau belum
                jika sudah retrun kan pesan error "Bahwa user sudah meminjam laptop lebih dari satu"
            */

            try {
                DB::beginTransaction();

                RentLogs::create($request->all());
                // Update data logs
                $laptops = Category::find($request->category_id);
                $laptops['status'] = "dipinjam";
                $laptops->save();

                // Update data user status
                $users = User::find($request->user_id);
                $users['status'] = 'meminjam';
                $users->save();

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

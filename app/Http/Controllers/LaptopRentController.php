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

        $category = Category::all();
        $user = User::where("role_id", "!=", 1)->get();
        return view('dashboard.rent', ["category" => $category, "user" => $user]);
    }

    // Logic insert data logs rental laptop
    public function store(Request $request)
    {

        $request['rent_date'] = Carbon::now()->toString();
        $request['return_date'] = Carbon::now()->addHour(6)->toString();

        // $category = Category::class;
        // $laptop = Category::find($request->item_id);
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

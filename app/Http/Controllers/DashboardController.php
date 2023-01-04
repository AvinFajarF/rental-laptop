<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rent_Logs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $category = Category::count();
        $rent_logs = Rent_Logs::count();
        $date = Date('d-m-Y');
      

        return view('dashboard.layouts.main', ['users' => $users, 'category' => $category, 'rent_logs' => $rent_logs,'date' => $date,]);
    }

   
    public function user_list()
    {

       $users = User::all();
        return view('dashboard.dashboard',['users' => $users]);
       
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
        
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required',
            'kelas' => 'required',
            'NoHp'  => 'required|unique:users,NoHp|integer|min:12',
            'alamat'    => 'required||unique:users,alamat',
        ]);

        $request['password'] = Hash::make($request->password);

        User::create($request->all());

        return redirect('/dashboard/user-list')->with('tambah', "Berhasil menambah data dengan nama $request->username");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        User::where('slug', $id)->delete($id);
        return redirect('/dashboard/user-list')->with('success', "Berhasil menghapus data dengan nama $id");
    }
}

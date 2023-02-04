<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetrunLaptopController extends Controller
{

    public function updateStatus($slug,$id)
    {
        $laptop = Category::find($id);
        $auth     = Auth::user();
        $userFind = User::find($auth)->first();
        $status = RentLogs::find($auth)->first();

        $laptop['status'] = "ready";
        $laptop->save();

        $status['status'] = 'dikembalikan';
        $status->save();

        $userFind['status'] = '';
        $userFind->save();
        return redirect('/');
    }

}

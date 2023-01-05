<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryDashboard extends Controller
{
    

    public function index()
    {
        return view('dashboard.category-list');
    }


}

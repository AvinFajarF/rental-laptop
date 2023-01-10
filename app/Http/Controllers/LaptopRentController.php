<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaptopRentController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('dashboard.rent',["category" => $category]);
    }

    public function Rental(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toString();
        $request['return_date'] = Carbon::now()->addHour(6)->toString();

      

        return redirect('/dashboard/rent');
    }

}

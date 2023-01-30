<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogsController extends Controller
{
   public function index()
   {

    $rentlogs = RentLogs::with(['user','category'])->get();
    return view('dashboard.rentlogs',['rentlogs' => $rentlogs]);
   }
}

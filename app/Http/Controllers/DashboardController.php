<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Active,
};
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        // Get the used company


        return view('pages.dashboard.index');
    }

    public function data()
    {

    }


}

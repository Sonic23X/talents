<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Active,
    Profile,
    Suscription,
    Work
};
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        // Get the used company
        $data = [
            'profiles' => Profile::count(),
            'subs' => Suscription::count(),
            'views' => Profile::sum('views'),
            'downloads' => Profile::sum('downloads'),
            'works' => Work::all()
        ];

        return view('pages.dashboard.index', $data);
    }

    public function data()
    {

    }


}

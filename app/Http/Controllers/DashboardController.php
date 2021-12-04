<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\{
    Profile,
    Suscription,
    Work
};

class DashboardController extends Controller
{

    public function index()
    {
        $data = null;
        if (Auth::user()->hasRole('admin'))
            $data = [
                'profiles' => Profile::count(),
                'subs' => Suscription::count(),
                'views' => Profile::sum('views'),
                'downloads' => Profile::sum('downloads'),
                'works' => Work::all()
            ];
        else if (Auth::user()->hasRole('client'))
            $data = [
                'profiles' => Profile::where('client_id', Auth::user()->id)->count(),
                'subs' => Suscription::count(),
                'views' => Profile::where('client_id', Auth::user()->id)->sum('views'),
                'downloads' => Profile::where('client_id', Auth::user()->id)->sum('downloads'),
            ];
        else
            $data = [
                'profile' => Profile::where('user_id', Auth::user()->id)->first()
            ];
        return view('pages.dashboard.index', $data);
    }

}

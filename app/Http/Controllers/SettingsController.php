<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Work,
    User
};
use Illuminate\Support\Facades\Redirect;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the works resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexW()
    {
        $data = [
            'works' => Work::all(),
        ];
        return view('pages.works.index', $data);
    }

    /**
     * Show the form for creating a new work resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createW()
    {
        return view('pages.works.new');
    }

    /**
     * Store a newly created work resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeW(Request $request)
    {
        $work = $request->validate([
            'name' => 'required|string'
        ]);

        Work::create($work);

        return redirect()->route('work');
    }

    /**
     * Display a listing of the works resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexU()
    {
        $users = User::all()->filter(function ($user) {
            return $user->hasAnyRole([User::TYPE_ADMIN, User::TYPE_ROOT]);
        });

        $data = [
            'users' => $users,
        ];
        return view('pages.users.index', $data);
    }

    /**
     * Show the form for creating a new work resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createU()
    {
        return view('pages.users.new');
    }

    /**
     * Store a newly created work resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeU(Request $request)
    {
        $userRequest = $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|confirmed|string',
        ]);

        $user = User::create($userRequest);

        if ($request->type == 1)
            $user->assignRole(User::TYPE_ADMIN);
        else
            $user->assignRole(User::TYPE_ROOT);

        return redirect()->route('userAdmin');
    }
}

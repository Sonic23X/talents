<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\{
    Profile,
    User,
    Work
};

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = null;
        if (Auth::user()->hasRole(User::TYPE_ADMIN))
            $profiles = Profile::where('client_id', Auth::user()->id)->get();
        else
            $profiles = Profile::all();

        $data = [
            'profiles' => $profiles,
        ];
        return view('pages.profiles.admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $works = Work::all();
        return view('pages.profiles.admin.new', compact('works'));
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
            'name' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
            'trabajo' => 'required',
            'phone' => 'required',
            'fb' => '',
            'twitter' => '',
            'lnkid' => ''
        ]);

        $userData = [
            'name' => $request->name,
            'last_name' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($userData);
        $user->assignRole(User::TYPE_USER);

        $profileData = [
            'uuid' => Str::uuid(),
            'name' => $request->name . ' ' . $request->last_name,
            'description' => $request->about,
            'phone' => $request->phone,
            'facebook' => $request->fb,
            'twitter' => $request->twitter,
            'linkedin' => $request->lnkid,
            'work_id' => $request->trabajo,
            'picture' => null,
            'type' => 1,
            'user_id' => $user->id,
            'client_id' => Auth::user()->id,
            'views' => 0,
            'downloads' => 0
        ];

        Profile::create($profileData);

        return response()->json([], 200);
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
        $works = Work::all();
        $profile = Profile::findOrFail($id);
        return view('pages.profiles.admin.edit', compact('works', 'profile'));
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
        $profileData = $request->validate([
            'description' => 'required',
            'phone' => 'required',
            'facebook' => '',
            'twitter' => '',
            'linkedin' => '',
            'work_id' => 'required'
        ]);

        Profile::findOrFail($id)->update($profileData);

        return redirect('profiles/admin');
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
}

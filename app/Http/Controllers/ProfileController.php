<?php

namespace App\Http\Controllers;

use JeroenDesloovere\VCard\VCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\{
    Profile,
    User,
    Work,
    Image
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
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'work_id' => 'required',
            'phone' => 'required',
            'fb' => '',
            'twitter' => '',
            'lnkid' => '',
            'type' => 'required',
            'description' => 'required'
        ]);

        $userData = [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($userData);
        $user->assignRole(User::TYPE_USER);

        // Save Profile photo
        $path = null;
        if ($request->has('picture')) {
            $name =  Str::random(10) . '.' . $request->file('picture')->extension();
            $path = "profile/{$user->id}/{$name}";
            $request->file('picture')->storeAs("public/profile/{$user->id}", $name);
        }

        $profileData = [
            'uuid' => Str::uuid(),
            'name' => $request->name . ' ' . $request->last_name,
            'description' => $request->description,
            'phone' => $request->phone,
            'facebook' => $request->fb,
            'twitter' => $request->twitter,
            'linkedin' => $request->lnkid,
            'work_id' => $request->work_id,
            'picture' => $path,
            'type' => $request->type,
            'user_id' => $user->id,
            'client_id' => Auth::user()->id,
            'views' => 0,
            'downloads' => 0
        ];

        $profile = Profile::create($profileData);

        $files = $request->file('portafolio');

        if ($request->hasFile('portafolio')) {
            foreach ($files as $file) {
                $name =  Str::random(10) . '.' . $file->extension();
                $pathP = "portafolio/{$profile->id}/{$name}";
                $file->storeAs('public/portafolio/' . $profile->id, $name);

                Image::create(['path' => $pathP, 'profile_id' => $profile->id]);
            }
        }

        return redirect('profiles/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        $work = Work::find($profile->work_id);
        $user = User::find($profile->user_id);
        $images = Image::where('profile_id', $id)->get();
        if ($profile->type == 1)
            return view('pages.profiles.public.index1', compact('profile', 'work', 'user', 'images'));
        else if ($profile->type == 2)
            return view('pages.profiles.public.index2', compact('profile', 'work', 'user', 'images'));
        else
            return view('pages.profiles.public.index3', compact('profile', 'work', 'user', 'images'));
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
            'work_id' => 'required',
            'type' => 'required'
        ]);

        Profile::findOrFail($id)->update($profileData);

        if (Auth::user()->hasRole('user'))
            return redirect('dashboard');
        else
            return redirect('profiles/admin');
    }

    public function vcard($id)
    {
        $profile = Profile::findOrFail($id);
        $user = User::findOrFail($profile->user_id);

        // Update download
        $profile->downloads += 1;
        $profile->save();

        $vcard = new VCard();
        $vcard->addName($user->last_name, $user->name);
        $vcard->addEmail($user->email);
        $vcard->addPhoneNumber($profile->phone, 'PREF');
        return $vcard->download();
    }

    public function showPublic($uuid)
    {
        $profile = Profile::where('uuid', $uuid)->firstOrFail();
        $profile->views += 1;
        $profile->save();

        $work = Work::find($profile->work_id);
        $user = User::find($profile->user_id);
        if ($profile->type == 1)
            return view('pages.profiles.public.index1', compact('profile', 'work', 'user'));
        else if ($profile->type == 2)
            return view('pages.profiles.public.index2', compact('profile', 'work', 'user'));
        else
            return view('pages.profiles.public.index3', compact('profile', 'work', 'user'));
    }
}

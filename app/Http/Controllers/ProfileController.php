<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Profile;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    protected $redirectPath = '/auth/login';
    protected $settingsPath = '/profile/edit';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        $profile = Profile::getUserProfile(Auth::user()->id);

        return view('profile/show', ['user' => $user, 'profile' => $profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the profile.
     *
     * @return Response
     */
    public function edit()
    {
        $user = Auth::user();
        $profile = Profile::getUserProfile(Auth::user()->id);

        return view('profile/edit', ['user' => $user, 'profile' => $profile]);
    }

    /**
     * Update the user profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $profile = Profile::getUserProfile(Auth::user()->id);

        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->birth_date = $request->birth_date;
        $profile->gender = $request->gender;
        $profile->location = $request->location;
        $profile->about_me = $request->about_me;
        $profile->website = $request->website;
        $profile->facebook = $request->facebook;
        $profile->twitter = $request->twitter;
        $profile->google_plus = $request->google_plus;

        $profile->save();

        return redirect($this->settingsPath)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

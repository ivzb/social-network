<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Image;
use Auth;
use Validator;
use App\User;
use App\Profile;
use App\Post;
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
        return $this->show(Auth::user()->username);
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
     * @param  int  $username
     * @return Response
     */
    public function show($username)
    {
        $logged_user = Auth::user();

        $user = User::getUser($username);
        $profile = Profile::getUserProfile($user->id);
        $posts = Post::getUserPosts($user->id);

        return view('profile/show',
            [
                'user' => $logged_user,
                'profile' => $profile,
                'posts' => $posts
            ]);
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
        // TODO: Add validation

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
     * Uploads picture.
     *
     * @param  Request  $request
     * @return Response
     */
    public function uploadPicture(Request $request)
    {
        $input = [ 'image' => $request->image ];
        $rules = [ 'image' => 'image|required' ];
        $messages = [ 'image' => 'Invalid image file.', 'required' => 'Image file is required.' ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $image_path = '/users/' . Auth::user()->username . '/profile_picture.jpg';

            Image::make($input['image'])->encode('jpg', 80)->save(public_path() . $image_path);
            Profile::setProfilePicture(Auth::user()->id, $image_path . '?' . str_random(5));

            return redirect($this->settingsPath);
        }
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

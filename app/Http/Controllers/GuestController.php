<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    protected $redirectPath = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('guest');
    }
}

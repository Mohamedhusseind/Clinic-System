<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Receptionist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getLogout(Request $request){
        $request->session()->forget('receptionist_name');
        $request->session()->forget('receptionist_id');
        return view('home');
    }
}

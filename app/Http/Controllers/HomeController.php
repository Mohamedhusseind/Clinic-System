<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Receptionist;
use Illuminate\Http\Request;
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
    public function doctor_login()
    {
        return view('doctor.doctor_login');
    }
    public function doctor_check(Request $request)
    {
        if (isset($request)){
            $doctor = Doctor::find(['email',$request['email']]);
            if($doctor)
            {
                return view('doctor.doctor_page');
            }
            else
            {echo "not found";}
        }
        return view('doctor_login');
    }

    public function receptionist_login()
    {
        return view('receptionist.receptionist_login');
    }
    public function receptionist_register()
    {
        return view('receptionist.register');
    }
    public function receptionist_check(Request $request)
    {
        if (isset($request)){
            $receptionist = Receptionist::find(['name',$request['name']]);
            if($receptionist)
            {
                return view('receptionist.receptionist_page');
            }
            else
            {echo "not found";}
        }
        return view('doctor_login');
    }

}

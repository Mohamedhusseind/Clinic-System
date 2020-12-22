<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function doctor_login()
    {
        return view('doctor.doctor_login');
    }
    public function doctor_check(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (isset($request)){
            $doctor = Doctor::where('email','=',$email)->first();
            if(isset($doctor))
            {
                if(!Hash::check($password, $doctor->password))
                    echo "password not match";
                else {return view('doctor.index');}
            }
            else
            {echo "not match";}
        }
    }
}

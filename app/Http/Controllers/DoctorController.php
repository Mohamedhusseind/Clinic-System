<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Dotenv\Validator;
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
                    return redirect()->back()->with('msg',"Wrong Password! please tray again");
                else
                {
                    $request->session()->put('doctor_id',$doctor->id);
                    $request->session()->put('doctor_name',$doctor->name);
                    return view('doctor.index');
                }
            }
            else
            {
                return redirect()->back()->with('msg',"This Email Not Exist! please try again");
            }
        }
    }
    public function add_appointment()
    {
        return view('doctor.addAppointment');
    }
    public function store_appointment(Request $request)
    {
        $validator = Validator::make($request->all(),[]);
        if (isset($request)){
            $appointment = Appointment::create([
                'doctor_id'=>$request->doctor_id,
                'status'=>$request->status,
                'diagnosis'=>$request->diagnosis,
            ]);
            if ($appointment){
                return redirect()->back()->with('msg',"Appointment added successfully");
            }
            else
                return redirect()->back()->with('msg',"Addition Fail");

        }

    }

}


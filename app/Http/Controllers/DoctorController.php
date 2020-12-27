<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\DoctorRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
############################### DOCTOR Functions ###################
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

    public function  add_doctor()
    {
        return view('doctor.addDoctor');
    }

    public function store_doctor(DoctorRequest $request)
    {
        if(isset($request))
        {
            if ($request->password==$request->repeatPassword)
            {
                Doctor::create([
                    'name'=>$request->name,
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'password'=>Hash::make($request['password']),
                    'email'=>$request->email,
                ]);
                return redirect()->back()->with('msg','Dotor Added Successfuly');

            }
            else
                echo 'not match';
        }
        else
            echo 'error';
    }

    public function list_doctors()
    {
        $doctors = Doctor::all();
        return view('doctor.showDoctors',compact('doctors'));
    }
####################### Appointment Functions #################333
    public function add_appointment()
    {
        return view('doctor.addAppointment');
    }
    public function store_appointment(AppointmentRequest $request)
    {
        if (isset($request)){
            $appointment = Appointment::create([
                'doctor_id'=>$request->doctor_id,
                'patient_id'=>$request->patient_id,
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
    public function list_appointments()
    {
        $appointments = Appointment::all();
        return view('doctor.showAppointments',compact('appointments'));
    }

    public function list_patients()
    {
        $patients = Patient::all();
        return view('doctor.showPatients',compact('patients'));
    }
}


<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:receptionist');
    }
    public function add_patient(Request $request)
    {
        return view('receptionist.addPatient');
    }

######################## Patient Store ##################################
    public function store_patient(PatientRequest $request)
    {
        //$validator = Validator::make($request->all(), $rules, $messages);

        //if($validator->fails()){return redirect()->back()->withErrors($validator)->withInput($request->all());}
        /*******check password *******/
        if (isset($request)) {
            $patient = Patient::where('phone', '=', $request->phone)->first();
            if ($patient == true) {
                return redirect()->back()->with('error', 'This patient Already Exist');
            } else {
                $patient = Patient::create([
                    'reception_id' => $request->receptionist_id,
                    'patient_name' => $request->name,
                    'status' => $request->status,
                    'age' => $request->age,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                ]);
                return redirect()->back()->with(['msg', 'Done Receptionist Added Successfully']);
            }
            return redirect()->back()->with('error', 'The Password not match');

        } else
            return redirect()->back();
    }

    public function list_patient()
    {
        $patients = Patient::select('id','reception_id','patient_name','status','age','address','phone','gender')->get();
        return view('receptionist.showPatients',compact('patients'));
    }
}

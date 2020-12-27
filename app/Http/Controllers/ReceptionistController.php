<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\PatientRequest;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Receptionist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ReceptionistController extends Controller
{
    public function receptionist_login()
    {
        return view('receptionist.receptionist_login');
    }

    public function add_receptionist()
    {
        return view('doctor.addReceptionist');
    }
    public function list_receptionists()
    {
        $receptionists = Receptionist::all();
        return view('doctor.showReceptionists',compact('receptionists'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [], []);
        /*******check password *******/
        if (isset($request)) {
            $receptionist = Receptionist::where('email', '=', $request->email)->first();
            if ($receptionist == true) {
                return redirect()->back()->with('error', 'This Email Already Exist');
            }
            if ($request->password == $request->repeatPassword) {
                $receptionist = Receptionist::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'doctor_id' => $request->doctor_id,
                    'phone' => $request->phone,
                    'password' => Hash::make($request['password'])
                ]);
                return redirect()->back()->with(['msg', 'Done Receptionist Added Successfully']);
            } else
                return redirect()->back()->with('error', 'The Password not match');

        } else
            return redirect()->back()->with('error', 'Should fill fields');
    }

    public function receptionist_check(Request $request)
    {
        if (isset($request)) {
            $receptionist = Receptionist::where('email', '=', $request->email)->first();
            if (isset($receptionist)) {
                if (!Hash::check($request->password, $receptionist->password))
                    return redirect()->back()->with('msg', 'Wrong Password!');
                else {
                    $request->session()->put('receptionist_id', $receptionist->id);
                    $request->session()->put('receptionist_name', $receptionist->name);
                    return view('receptionist.index');
                }
            } else {
                return redirect()->back()->with('msg', 'This Email Not Exist');
            }
        }
        return view('doctor_login');
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
            echo "error";

        //return view('receptionist.register');
    }

    public function list_patients()
    {
        $patients = Patient::select('id','reception_id','patient_name','status','age','address','phone','gender')->get();
        return view('receptionist.showPatients',compact('patients'));
    }

############################# Invoice ###################
public function add_invoice()
{
    return view('receptionist.addInvoice');
}
public function store_invoice(InvoiceRequest $request)
{
    if(isset($request))
    {
        $invoice = Invoice::create([
            'reception_id' => $request->receptionist_id,
            'patient_id' => $request->patient_id,
            'patient_name' =>$request->name,
            'patient_status' => $request->status,
            'reservation_price' => $request->price,
            'phone' =>$request->price,
        ]);
    }
    return redirect()->back()->with('msg','Invouce Added Successfully');

}
public function show_invoices()
{
    $invoices = Invoice::select('id','reception_id','patient_id','patient_name','patient_status','reservation_price','phone')->get();
    return view('receptionist.showInvoices',compact('invoices'));
}


}

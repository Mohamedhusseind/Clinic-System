<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\PatientRequest;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Receptionist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::guard('receptionist')->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $receptionist = Receptionist::where('email','=',$request->email)->first();
            $request->session()->put('receptionist_id',$receptionist->id);
            $request->session()->put('receptionist_name',$receptionist->name);
            return view('receptionist.index');
        }
        else
        {
            return redirect()->back()->with('msg',"This Email Not Exist! please try again");
        }
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

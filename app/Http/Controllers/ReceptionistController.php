<?php

namespace App\Http\Controllers;

use App\Models\Receptionist;
use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    public function receptionist_login()
    {
        return view('receptionist.receptionist_login');
    }
    public function receptionist_register()
    {
        return view('receptionist.register');
    }

    public function receptionist_store(Request $request)
    {
        if (isset($request))
        {
            $receptionist = Receptionist::create([
                'name'=>$request->name,
                'address'=>$request->address,
                'doctor_id'=>$request->doctor_id,
                'phone'=>$request->phone,
                'password'=>Hash::make($request['password'])
            ]);
            return $receptionist;
        }
        else
            return view('receptionist.register');

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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add_product()
    {
        return view('doctor.addProduct');
    }

    public function store_product(ProductRequest $request)
    {
        if (isset($request))
        {
            $product = Product::create([
                'name'=>$request->name,
                'doctor_id'=>$request->doctor_id,
                'description'=>$request->description,
                'quantity'=>$request->quantity,
                'price'=>$request->price,
            ]);
            return redirect()->back()->with('msg','Product Added Successfully');
        }
        else return redirect()->back()->with('msg','Should fill fields');
    }
    public function list_products()
    {
        $products = Product::all();
        return view('doctor.showProducts',compact('products'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:doctor');
    }
    public function add_recipe()
    {
        $products = Product::select('name')->get();
        return view('doctor.addRecipe',compact('products'));
    }
    public function store_recipe(RecipeRequest $request)
    {
        if (isset($request)){
            $recipe = Recipe::create([
                'doctor_id'=>$request->doctor_id,
                'patient_id'=>$request->patient_id,
                'product_name'=>$request->product,
                'description'=>$request->diagnosis,

            ]);
            if ($recipe){
                return redirect()->back()->with('msg',"Recipe added successfully");
            }
            else
                return redirect()->back()->with('msg',"Addition Fail");

        }
    }
    public function list_recipes()
    {
        $recipes = Recipe::all();
        return view('doctor.showRecipes',compact('recipes'));
    }
}

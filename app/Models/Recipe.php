<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id','patient_id', 'product_name', 'description'
    ];
    public $timestamps=true;
}

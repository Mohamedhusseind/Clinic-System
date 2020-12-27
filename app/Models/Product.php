<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable=[
        'name','description','doctor_id','quantity','price','updated_at','created_at'
    ];
    public $timestamps=true;
}

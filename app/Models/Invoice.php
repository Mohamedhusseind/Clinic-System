<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public $fillable = ['reception_id','patient_name','patient_id','patient_status','reservation_price','phone'];
    public $timestamps=false;
}

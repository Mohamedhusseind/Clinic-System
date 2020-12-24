<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'reception_id','patient_name','status', 'age','address','phone','gender'
    ];
    public $timestamps=false;
}

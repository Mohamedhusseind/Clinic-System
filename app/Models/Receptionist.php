<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'doctor_id', 'name','phone','address','password'
    ];
}

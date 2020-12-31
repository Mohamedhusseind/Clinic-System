<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Receptionist extends Authenticatable
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'doctor_id', 'name','phone','email','address','password'
    ];
    public $timestamps = false;
}

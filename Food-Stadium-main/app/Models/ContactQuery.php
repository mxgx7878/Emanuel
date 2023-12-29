<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactQuery extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name' ,
        'email' ,
        'first_name' ,
        'last_name' ,
        'company' ,
        'address' ,
        'appartment' ,
        'city' ,
        'state' ,
        'zipcode' ,
        'phone' ,
    ];

}

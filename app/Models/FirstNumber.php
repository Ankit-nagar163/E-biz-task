<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstNumber extends Model
{
    use HasFactory;
    protected $fillable =[
        'number',
    ];

}

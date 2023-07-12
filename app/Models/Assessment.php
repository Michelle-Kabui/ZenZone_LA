<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Assessment extends Model
{
    protected $fillable = [
        'email',
        'set1_mean',
        'set2_mean',
        'result',
    ];
}

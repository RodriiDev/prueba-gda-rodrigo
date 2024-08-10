<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'id_reg',
        'description',
        'status'
    ];

    public $timestamps = false;
}
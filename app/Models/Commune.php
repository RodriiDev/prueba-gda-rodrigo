<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = [
        'id_com',
        'id_reg',
        'description',
        'status'
    ];

    public $timestamps = false;
}
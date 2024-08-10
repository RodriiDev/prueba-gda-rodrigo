<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomersLog extends Model
{

    protected $table = 'customers_log';

    protected $fillable = [
        'id',
        'dni',
        'name_customer',
        'tipo',
        'ip',
        'date',
    ];

    public $timestamps = false;
}
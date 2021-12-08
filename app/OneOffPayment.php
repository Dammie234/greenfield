<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OneOffPayment extends Model
{
    protected $fillable = [
        'user_id', 'service_id', 'year', 'status'
    ];
}

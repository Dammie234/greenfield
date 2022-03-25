<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['user_id', 'service_id', 'invoice_number', 'name', 'email', 'phone', 'payment_type', 'year', 'description', 'amount', 'token'];
}

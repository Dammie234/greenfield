<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['user_id', 'house_number', 'street_name', 'property_class', 'property_category', 'property_type'];
}

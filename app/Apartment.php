<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = ['user_id', 'property_id', 'building_type', 'number_of_3_bedroom', 'number_of_2_bedroom', 'number_of_room_and_palour', 
    'number_of_self_contain', 'number_of_shop', 'number_of_office_space', 'description', 'transformer'];
}

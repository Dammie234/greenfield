<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = ['user_id', 'nationality', 'date_of_birth', 'marital_status', 'name_of_spouse', 'phone_number_home', 'phone_number_whatsapp', 'gender', 'religion', 
    'wedding_aniversary_date', 'occupation', 'date_moved_in', 'are_you_a_resident', 'next_of_kin', 'relationship_with_next_of_kin', 'next_of_kin_phone_number'];
}

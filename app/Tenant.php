<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['landlord_user_id', 'user_id', 'apartment_id', 'property_id', 'apartment_type', 'third_party_name', 'third_party_phone', 'third_party_email', 'third_party_whatsapp'];
}

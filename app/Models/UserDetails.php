<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
    	'user_id', 'profession', 'profile_image', 'mariage_status', 'gender', 'date_of_birth', 'zip_code', 'address', 'number', 'location', 'cnic', 'city', 'state', 'company_name'
    ];
}

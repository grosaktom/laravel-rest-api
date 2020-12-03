<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'profile_picture'       
    ];
	
	protected $hidden = ['created_at','updated_at'];
}

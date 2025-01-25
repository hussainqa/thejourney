<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class hosts extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'company_id',
        'valid',
        'ad_1_access',
        'ad_2_access',
        'ad_3_access',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = ['email', 'password', 'is_admin', 'phone_number'];

    public function userData()
    {
        return $this->hasOne(UserData::class, 'user_id');
    }
}

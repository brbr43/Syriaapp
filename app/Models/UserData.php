<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'birth_place',
        'birth_date',
        'record_number',
        'residence_place',
        'bio',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profil extends Model
{
    use HasFactory;
    protected $fillable = [
        'avatar',
        'telephone',
        'bio',
        'adresse',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

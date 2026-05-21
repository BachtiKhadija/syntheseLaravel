<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Module extends Model
{
    use HasFactory;
    //
    protected $fillable=['nom','nbrHeure'];
    public function courses(){
        return $this->hasMany(Course::class);
    }
}

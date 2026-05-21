<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use App\Models\Module;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    //
    use HasFactory;
    use SoftDeletes;
     protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
      public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
    public function categories()
{
    return $this->belongsToMany(Category::class);
}

}

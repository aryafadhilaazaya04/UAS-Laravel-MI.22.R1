<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // App\Models\Category::create([
    //     'name' => 'Programming',
    //     'slug' => 'programming',
    // ]);

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

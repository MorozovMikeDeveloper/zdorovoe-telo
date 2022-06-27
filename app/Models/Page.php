<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $guarded = [];

//    public function sluggable(): array
//    {
//        return [
//            'slug' => [
//                'source' => 'name'
//            ]
//        ];
//    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}

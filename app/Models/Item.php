<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'price',
        'location',
        'user_id',
        'category_id',
    ];

    public function images() {
        return $this->hasMany('App\Models\Image', 'item_id');
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

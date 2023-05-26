<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'slug',
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

    public static function boot() {
        parent::boot();

        // registering a callback to be executed upon the creation of an activity AR
        static::creating(function($item) {

            // produce a slug based on the activity title
            $slug = Str::slug($item->name);

            // check to see if any other slugs exist that are the same & count them
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

            // if other slugs exist that are the same, append the count to the slug
            $item->slug = $count ? "{$slug}-{$count}" : $slug;

        });

    }
}

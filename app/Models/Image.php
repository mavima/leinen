<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'filename', 'item_id'];


    public function item() {
        return $this->belongsTo('App\Models\Item', 'item_id');
    }
}

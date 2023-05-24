<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Item;
use App\Models\Image;

class ShowItemController extends Controller
{
    public function show(Item $item) {
        $images = [];
        $images = Image::where('item_id', $item->id)->get();
        
        $currentUser = Auth::check() ? Auth::id() : null;
        return view('show', ['item' => $item, 'images' => $images, 'currentUser' => $currentUser]);
    }
}

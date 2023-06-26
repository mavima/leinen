<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Item;
use App\Models\Image;
use App\Repositories\ItemRepository;

class ShowItemController extends Controller
{
    public function show(ItemRepository $itemRepository, $slug) {
        $item = $itemRepository->findBySlug($slug);
        $images = [];
        $images = Image::where('item_id', $item->id)->get();
        
        $currentUser = Auth::check() ? Auth::id() : null;
        return view('show', ['item' => $item, 'images' => $images, 'currentUser' => $currentUser]);
    }
}

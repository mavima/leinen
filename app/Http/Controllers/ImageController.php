<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\Item;


class ImageController extends Controller
{
    public function createImage(Request $request, Item $item) {
        return view('images/create')->with('item', $item);
    }

    public function store(Request $request, Item $item) {
        $path = $request->file('image')->store('images', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');
        $image = Image::create([
            'filename' => 'images/' . basename($path),
            'url' => Storage::disk('s3')->url($path),
            'item_id' => $item->id
        ]);

        return redirect('/show/'.$item->id)->with('item', $item);
    }

    public function delete(Request $request, Item $item, Image $image) {
        $image->delete();
        Storage::disk('s3')->delete($image->filename);
        $images = [];
        $images = Image::where('item_id', $item->id)->get();
        return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Item;
use App\Models\Image;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditItemController extends Controller
{
    public function edit(Item $item) {
        
        if (auth()->user()->id !== $item['user_id']) {
            return redirect('/');
        }
        $categories = Category::all();
        $images = [];
        $images = Image::where('item_id', $item->id)->get();
        return view('edit', ['item' => $item, 'images' => $images, 'categories' => $categories]);
    }

    public function update(Item $item, Request $request) {
        // POLICY & Middleware
        if (auth()->user()->id !== $item['user_id']) {
            return redirect('/index');
        }
        $inputFields = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:800',
            'price' => 'required|integer|min:0|max:10000',
            'location' => 'required|string|max:100',
            'category_id'=> 'filled',
        ]);

        $inputFields['name'] = strip_tags($inputFields['name']);
        $inputFields['description'] = strip_tags($inputFields['description']);
        $input['location'] = strip_tags($inputFields['location']);
        $user_id = Auth::user()->id;
        $input['user_id'] = $user_id;
        $item->update($inputFields);

        $currentUser = Auth::check() ? Auth::id() : null;
        $images = Image::where('item_id', $item->id)->get();
        return view('show', ['item' => $item, 'images' => $images, 'currentUser' => $currentUser]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Item;
use App\Models\Category;

class CreateItemController extends Controller
{
    public function new() {
        $categories = Category::get();
        return view('/create', ['categories' => $categories]);
    }

    public function create(Request $request) {
        $input = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer|min:0|max:100000',
            'location' => 'required',
            'category_id' => 'required'
        ]);
        // Remove malicious input
        $input['name'] = strip_tags($input['name']);
        $input['description'] = strip_tags($input['description']);
        $input['location'] = strip_tags($input['location']);
        $user_id = Auth::user()->id;
        $input['user_id'] = $user_id;
        $item = Item::create($input);
        
        return redirect('images/create/'.$item->slug)->with('item', $item);
    }
}

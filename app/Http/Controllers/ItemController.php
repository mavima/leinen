<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use AWS\CRT\HTTP\Response;

class ItemController extends Controller
{

    public function index(Request $request) {
        if (count($request->all()) > 0) {
        $search = $request->input('search');
        $items = Item::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
        } else {
            $items = Item::orderBy('id', 'desc')->take(20)->get();
        }
        return view('index', ['items'=>$items]);
    }


    public function show(Item $item) {
        $images = [];
        $images = Image::where('item_id', $item->id)->get();
        $currentUser = Auth::check() ? Auth::id() : null;
        return view('show', ['item' => $item, 'images' => $images, 'currentUser' => $currentUser]);
    }

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
        ]);
        // Remove malicious input
        $input['name'] = strip_tags($input['name']);
        $input['description'] = strip_tags($input['description']);
        $input['location'] = strip_tags($input['location']);
        $user_id = Auth::user()->id;
        $input['user_id'] = $user_id;
        $item = Item::create($input);
        
        return redirect('images/create/'.$item->id)->with('item', $item);
    }

    public function edit(Item $item) {
        
        if (auth()->user()->id !== $item['user_id']) {
            return redirect('/');
        }
        $images = [];
        $images = Image::where('item_id', $item->id)->get();
        return view('edit', ['item' => $item, 'images' => $images]);
    }

    public function update(Item $item, Request $request) {
        // POLICY & Middleware
        if (auth()->user()->id !== $item['user_id']) {
            return redirect('/index');
        }
        $inputFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer|min:0|max:100000',
            'location' => 'required',
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

    public function delete(Item $item) {
        // POLICY & Middleware
        if (auth()->user()->id === $item['user_id']) {
            $item->delete();
        }
        return redirect('/index');
    }
}

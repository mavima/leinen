<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use AWS\CRT\HTTP\Response;

class ItemController extends Controller
{

    public function index(Request $request) {
        $categories = Category::all();
        if (count($request->all()) > 0 && $request->category_id == null) {
        $search = $request->input('search');
        $items = Item::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
        } else {
            $items = Item::orderBy('id', 'desc')
            ->with('category')
            ->when($request->category_id, function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->get();
        }
        return view('index', ['items'=>$items, 'categories' => $categories]);
    }


    public function show(Item $item) {
        $images = [];
        $images = Image::where('item_id', $item->id)->get();
        
        $currentUser = Auth::check() ? Auth::id() : null;
        return view('show', ['item' => $item, 'images' => $images, 'currentUser' => $currentUser]);
    }

    public function contact(Item $item) {
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return view('contact', ['item' => $item, 'months' => $months]);
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
            'category_id' => 'required'
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer|min:0|max:100000',
            'location' => 'required',
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

    public function delete(Item $item) {
        // POLICY & Middleware
        $user_id = Auth::check() ? Auth::id() : null;
        $user = User::where('id', $user_id)->first();
        if ($user_id === $item['user_id']) {
            $item->delete();
        }
        return redirect('profile/'.$user->id)->with('user', $user);
        // return redirect('images/create/'.$item->id)->with('item', $item);
    }
}

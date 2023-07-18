<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Item;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\ItemRepository;


class ItemController extends Controller
{
    private ItemRepository $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function index(Request $request) {


        $categories = Category::all();
        $items = $this->itemRepository->getItems($request);
        return view('index', ['items'=>$items, 'categories' => $categories]);
    }

    public function new() {
        $categories = Category::get();
        return view('/create', ['categories' => $categories]);
    }

    public function create(Request $request) {
        $input = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:800',
            'price' => 'required|integer|min:0|max:10000',
            'location' => 'required|string|max:100',
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

    public function show(ItemRepository $itemRepository, $slug) {
        $item = $itemRepository->findBySlug($slug);
        $images = [];
        $images = Image::where('item_id', $item->id)->get();
        
        $currentUser = Auth::check() ? Auth::id() : null;
        return view('show', ['item' => $item, 'images' => $images, 'currentUser' => $currentUser]);
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

    public function delete(Item $item) {
        // POLICY & Middleware
        $user_id = Auth::check() ? Auth::id() : null;
        $user = User::where('id', $user_id)->first();
        if ($user_id === $item['user_id']) {
            $item->delete();
        }
        return redirect('profile/'.$user->id)->with('user', $user);
    }
}

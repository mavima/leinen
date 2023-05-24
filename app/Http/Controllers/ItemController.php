<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;

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
}

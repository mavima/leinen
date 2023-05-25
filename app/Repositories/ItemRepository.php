<?php 

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Repositories\ItemInterface;
use App\Models\Item;


class ItemRepository implements ItemInterface {

    function getItems(Request $request): object {

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
        return $items;
    }

    function findBySlug($slug): object {
        $item = Item::where('slug', $slug)->first();
        return $item;
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}

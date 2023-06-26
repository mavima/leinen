<?php

namespace App\Http\Controllers;

use App\Models\Category;

class PageController extends Controller
{

    public function home()
    {
        $categories = Category::all();
        return view('home', ['categories' => $categories]);
    }

    public function about()
    {
        return view('about');
    }
}

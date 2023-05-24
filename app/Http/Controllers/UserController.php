<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile() {
        $user_id = Auth::check() ? Auth::id() : null;
        $user = User::where('id', $user_id)->first();
        $items = [];
        $items = Item::where('user_id', $user_id)->get();
        return view('profile', ['user' => $user, 'items' => $items]);
    }
}

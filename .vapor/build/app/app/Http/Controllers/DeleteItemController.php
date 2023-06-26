<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DeleteItemController extends Controller
{
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

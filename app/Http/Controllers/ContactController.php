<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ContactController extends Controller
{
    public function contact(Item $item) {
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return view('contact', ['item' => $item, 'months' => $months]);
    }
}

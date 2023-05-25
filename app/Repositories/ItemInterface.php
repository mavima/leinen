<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ItemInterface {

    function getItems(Request $request): object;
    function findBySlug($slug): object;
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class MylistController extends Controller
{
    public function index()
    {
    $user = auth()->user();
    $items = $user->favoriteItems;

    return view('items.index', compact('items'));
    }
}

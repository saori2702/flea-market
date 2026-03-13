<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Http\Requests\ExhibitionRequest;

class SellController extends Controller
{
    public function show()
{
    // セレクトボックスで選べるように全件取得
    $categories = Category::all();
    $conditions = Condition::all();

    return view('items.sell', compact('categories', 'conditions'));
}

    public function store(ExhibitionRequest $request)
    {
        $path = $request->file('image_url')->store('items', 'public');

        $categoryIds = $request->category_id ? implode(',', $request->category_id) : null;

        Item::create([
            'user_id' => auth()->id(),
            'category_id' => $categoryIds,
            'condition_id' => $request->condition_id,
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'image_url' => $path,
        ]);

        return redirect()->route('item.index');
    }
}
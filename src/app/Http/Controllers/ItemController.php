<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Like;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        if ($request->tab === 'mylist'){
            $user = auth()->user();
            $items = $user->favoriteItems;
        }
        else {
            $query = Item::query()->with('order');

            if ($request->filled('keyword')) {
                $keyword = $request->keyword;
                $query->where('name', 'like', '%' . $keyword . '%');
                }
            $items = $query->where('user_id', '!=', auth()->id())->get();
        }
        return view('items.index', compact('items'));
    }

    public function show($item_id)
    {
        $item = Item::with(['condition', 'comments.user', 'likes'])
            ->findOrFail($item_id);

        return view('items.show', compact('item'));
    }

    public function like($item_id)
    {
        Like::create([
            'user_id' => auth()->id(),
            'item_id' => $item_id,
        ]);
    return back();
    }

    public function unlike($item_id)
    {
        Like::where('user_id', auth()->id())->where('item_id', $item_id)->delete();
        return back();
    }

    public function comment(CommentRequest $request, $item_id)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'item_id' => $item_id,
            'content' => $request->content,
        ]);
        return back();
    }
}

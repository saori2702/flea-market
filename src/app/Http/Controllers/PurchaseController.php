<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseRequest;


class PurchaseController extends Controller
{
    public function show($item_id)
    {
        $item = Item::findOrFail($item_id);
        $user = Auth::user();
        $profile = $user->profile;

        return view('purchase.show', compact('item', 'user', 'profile'));
    }

    // 送付先変更画面表示
    public function editAddress($item_id)
    {
        $item = Item::findOrFail($item_id);
        $profile = Auth::user()->profile;
        return view('purchase.address', compact('item', 'profile'));
    }

    // 送付先変更保存
    public function updateAddress(PurchaseRequest $request, $item_id)
    {
        Auth::user()->profile()->updateOrCreate(
            ['user_id' => Auth::id()],
            $request->only(['post_code', 'address', 'building'])
        );

        return redirect()->route('purchase.show', ['item_id' => $item_id]);
    }

    // 購入保存
    public function store(Request $request, $item_id)
    {
        $item = Item::findOrFail($item_id);
        // すでに売れていないかチェック
        if ($item->order) {
            return redirect()->route('item.index');
        }

        $user = Auth::user();
        $profile = $user->profile;

        Order::create([
            'user_id' => Auth::id(),
            'item_id' => $item_id,
            'payment_method' => $request->payment_method,
            'post_code' => $profile->post_code,
            'address' => $profile->address,
            'building' => $profile->building,
        ]);

        return redirect()->route('item.index');
    }
}
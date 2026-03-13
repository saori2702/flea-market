<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Item;
use App\Models\Order;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $profile = $user->profile;
        $page = $request->query('page', 'sell');

        if ($page === 'buy') {
            $items = \App\Models\Item::whereHas('order', function($q) use ($user) {
            $q->where('user_id', $user->id);
            })->get();
        } else
        {
            $items = \App\Models\Item::where('user_id', $user->id)->get();
        }

        return view('profile.index', compact('user', 'profile', 'items', 'page'));
    }

    public function edit()
    {
        $user = auth()->user();
        $profile = $user->profile;

        return view('profile.edit', compact('user', 'profile'));
    }

    public function update(ProfileRequest $request)
    {
        $user = auth()->user();
        $user->update(['name' => $request->name]);
        $profile = $user->profile;

        $profileData = [
            'post_code' => $request->post_code,
            'address' => $request->address,
            'building' => $request->building,
        ];

        // storage/app/public/profiles フォルダへ保存
        if ($request->hasFile('image'))
        {
            $path = $request->file('image')->store('profiles', 'public');
            $profileData['image_url'] = $path;
        }

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $profileData
        );

        return redirect()->route('profile.index');
    }
}

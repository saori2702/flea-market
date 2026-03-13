<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Category;
use App\Models\Condition;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'condition_id', 'name', 'brand', 'description', 'price', 'image_url', 'category_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getCategoriesAttribute() {
        $value = $this->category_id;
        $cleanValue = str_replace(['"', "'"], '', (string)$value);
        $ids = explode(',', $cleanValue);
        return \App\Models\Category::whereIn('id', $ids)->get();
    }

    public function condition() {
        return $this->belongsTo(Condition::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function is_liked_by_auth_user()
    {
        return $this->likes->where('user_id', auth()->id())->first();
    }

}

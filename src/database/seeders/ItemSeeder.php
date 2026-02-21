<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Condition;
use App\Models\User;
use App\Models\Category;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::first(); //最初に作ったテストユーザーに紐付け

        $productData = [
            ['name' => '腕時計', 'price' => 15000, 'description' => 'スタイリッシュなデザインのメンズ腕時計', 'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Watch.jpg', 'condition' => '良好', 'brand' => 'Rolax'],
            ['name' => 'HDD', 'price' => 5000, 'description' => '高速で信頼性の高いハードディスク', 'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD.jpg', 'condition' => '目立った傷や汚れなし', 'brand' => '西芝'],
            ['name' => '玉ねぎ3束', 'price' => 300, 'description' => '新鮮な玉ねぎ3束のセット', 'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Onion.jpg', 'condition' => 'やや傷や汚れあり', 'brand' => 'なし'],
            ['name' => '革靴', 'price' => 4000, 'description' => 'クラシックなデザインの革靴', 'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes.jpg', 'condition' => '状態が悪い', 'brand' => ''],
            ['name' => 'ノートPC', 'price' => 45000, 'description' => '高性能なノートパソコン', 'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg', 'condition' => '良好', 'brand' => ''],
            ['name' => 'マイク', 'price' => 8000, 'description' => '高音質のレコーディング用マイク', 'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic.jpg', 'condition' => '目立った傷や汚れなし', 'brand' => 'なし'],
            ['name' => 'ショルダーバッグ', 'price' => 3500, 'description' => 'おしゃれなショルダーバッグ', 'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse.jpg', 'condition' => 'やや傷や汚れあり', 'brand' => ''],
            ['name' => 'タンブラー', 'price' => 500, 'description' => '使いやすいタンブラー', 'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Tumbler.jpg', 'condition' => '状態が悪い', 'brand' => 'なし'],
            ['name' => 'コーヒーミル', 'price' => 4000, 'description' => '手動のコーヒーミル', 'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg', 'condition' => '良好', 'brand' => 'Starbacks'],
            ['name' => 'メイクセット', 'price' => 2500, 'description' => '便利なメイクアップセット', 'image_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Makeup+Set.jpg', 'condition' => '目立った傷や汚れなし', 'brand' => ''],
        ];

        foreach ($productData as $data) {
            $condition = Condition::where('content', $data['condition'])->first();

            $category = Category::first(); //最初にカテゴリを紐付け

            Item::create([
                'user_id' => $user->id,
                'condition_id' => $condition->id,
                'category_id' => $category->id,
                'name' => $data['name'],
                'brand' => $data['brand'],
                'price' => $data['price'],
                'description' => $data['description'],
                'image_url' => $data['image_url'],
            ]);
        }
    }
}

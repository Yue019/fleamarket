<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'ノートパソコン',
                'price' => 15000,
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'is_purchased' => false,
                'img' => 'storage/img/clock.jpg',
                'condition_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HDD',
                'price' =>  5000,
                'description' => '高速で信頼性の高いハードディスク',
                'is_purchased' => false,
                'img' => 'storage/img/hdd.jpg',
                'condition_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '玉ねぎ3束',
                'price' => 300,
                'description' => '新鮮な玉ねぎ3束のセット',
                'is_purchased' => false,
                'img' => 'storage/img/onion.jpg',
                'condition_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '革靴',
                'price' => 4000,
                'description' => 'クラシックなデザインの革靴',
                'is_purchased' => false,
                'img' => 'storage/img/leather-shoes.jpg',
                'condition_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ノートPC',
                'price' => 45000,
                'description' => '高性能なノートパソコン',
                'is_purchased' => false,
                'img' => 'storage/img/Laptop.jpg',
                'condition_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'マイク',
                'price' => 8000,
                'description' => '高音質のレコーディング用マイク',
                'is_purchased' => false,
                'img' => 'storage/img/Mic.jpg',
                'condition_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ショルダーバッグ',
                'price' => 3500,
                'description' => 'おしゃれなショルダーバッグ',
                'is_purchased' => false,
                'img' => 'storage/img/pocket.jpg',
                'condition_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'タンブラー',
                'price' => 500,
                'description' => '使いやすいタンブラー',
                'is_purchased' => false,
                'img' => 'storage/img/tumbler.jpg',
                'condition_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'コーヒーミル',
                'price' => 4000,
                'description' => '手動のコーヒーミル',
                'is_purchased' => false,
                'img' => 'storage/img/coffee-grinder.jpg',
                'condition_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'メイクセット',
                'price' => 2500,
                'description' => '便利なメイクアップセット',
                'is_purchased' => false,
                'img' => 'storage/img/makeup.jpg',
                'condition_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('items')->insert($items);
    }
}

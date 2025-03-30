<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Category;
use App\Models\Condition;
use App\Http\Requests\ExhibitionRequest;
use Illuminate\Support\Facades\Storage;

class SellController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

        public function showSellForm()
    {
        $conditions = Condition::all(); // 商品状態一覧を取得
        $categories = Category::all(); // カテゴリ一覧を取得
            return view('sell', compact('conditions', 'categories'));
    }

        public function store(ExhibitionRequest $request)
    {
        // 画像のアップロード処理
        $imagePath = null;
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('public/img');
            $imagePath = str_replace('public/', '', $imagePath);
        }

        // 商品状態（condition_id）を取得
        $condition = Condition::findOrFail($request->select);

        // 商品の基本情報を保存
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->img = $imagePath;
        $item->condition_id = $condition->id;
        $item->save();

        if ($request->has('categories')) {
        $item->categories()->attach($request->categories); // 中間テーブルに保存
    }

        return redirect()->route('home')->with('success', '商品を出品しました！');

    }

}

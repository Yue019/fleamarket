<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Item;


class AuthController extends Controller
{
    public function index()
    {
        $items = Item::all(); // すべてのアイテムを取得
        return view('index', compact('items')); // index.blade.php に渡す

    }

    public function mypage()
    {
        return view('mypage');

    }


}

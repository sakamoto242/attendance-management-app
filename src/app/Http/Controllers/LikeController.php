<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * いいねを押す処理
     */
    public function store(Request $request, $productId)
    {
        // まだいいねしていなければ、新しく保存する
        if (!Like::where('user_id', Auth::id())->where('product_id', $productId)->exists()) {
            Like::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
            ]);
        }

        return redirect()->back(); // 元のページ（詳細画面）に戻る
    }

    /**
     * いいねを外す処理
     */
    public function destroy($productId)
    {
        // 自分のいいねを探して削除する
        $like = Like::where('user_id', Auth::id())->where('product_id', $productId)->first();
        if ($like) {
            $like->delete();
        }

        return redirect()->back();
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class PostsController extends Controller
{

    public function index(){
        // Postテーブルからレコード取得
        $list = Post::get();
        // bladeへ返すときにデータ送る
        return view('posts.index',['list' => $list]);
    }

    //投稿の登録
    public function postCreate(Request $request){
        //投稿フォームに書かれた内容を受け取る
        $post = $request->input('newPost');
        $user_id = Auth::user()->id;

        //投稿の登録
        Post::create([
            'user_id' => $user_id,
            'post' => $postContent
        ]);

        return redirect('/top');
    }
}

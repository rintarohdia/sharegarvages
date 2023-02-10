<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\prefecture;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
  public function index()
 {
    // DBよりBookテーブルの値を全て取得
    $posts=post::all();
    // 取得した値をビュー「book/index」に渡す
    return view('post.index', compact('posts'));
  }
  public function create()
 {

    return view('post.post');
  }
  public function store(Request $post)
 {
   $attributes=$request->only(["post_name","prefecture_id","CEO_name","capital","tel","mail"]);
   //操作すること
   post::create($attributes);
    return redirect()->route('post.index');
  }
  public function show(post $post)
 {
    return view('post.post_show', compact("post"));
  }
  public function edit(post $post)
 {
   return view('post.post_edit', compact('post'));
 }
 public function update(Request $request,$id)
{
  $update=[
    "post_name"=>$request->post_name
  ];
  post::where("id",$id)->update($update);
  return redirect()->route('post.index',$id);
}
public function __construct(){
    $this->middleware('auth');
  }
public function destroy($id)
  {
          // Booksテーブルから指定のIDのレコード1件を取得
        $post = post::find($id);
          // レコードを削除
        $post->delete();
          // 削除したら一覧画面にリダイレクト
        return redirect()->route('post.index');
      }
}

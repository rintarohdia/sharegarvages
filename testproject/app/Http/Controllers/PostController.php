<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\prefecture;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PostRequest;
use App\Post as pp;
use Illuminate\Support\Facades\Auth;

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
   $attributes=$post->only(["prefecture","content"]);
   //操作すること
   $user = Auth::id();
   $corp=["corp" => User::find($user)->cop_id];
   $attributes= array_merge($attributes, $corp);
   //$attributeはphp array型に変換されているので、corpをappendすればよい。corpcontrollerにもやること
   $inserted=post::create($attributes);
    return redirect()->route('post.index');
  }
  public function show(post $post)
 {
    return view('post.show', compact("post"));
  }
  public function edit(post $post)
 {
   return view('post.edit', compact('post'));
 }
 public function update(Request $request,$id)
{
  $update=[
    "prefecture"=>$request->prefecture,
    "content"=>$request->content
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

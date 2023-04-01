<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\reply;
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
  public function store(Request $request)
 {
   $attributes=$request->only(["prefecture","content"]);
   //操作すること
   $user = Auth::id();
   $photo_exist=["photo_exist"=>!is_null($request->photo)];
   $attributes=array_merge($attributes, $photo_exist);
   $corp=["corp" => User::find($user)->cop_id];
   $inserted=post::create(array_merge($attributes, $corp));
   //Id名でやりたいので先に保存する。
   //$attributeはphp array型に変換されているので、corpをappendすればよい。corpcontrollerにもやること
   //画像を保存する。名前はidで管理する。
   $request->file("photo")->storeAs("public/",(string)$inserted->id.".jpg");
    return redirect()->route('post.index');
  }
  public function show(post $post)
 {
    $replys=reply::where("post",$post->id)->get();
    return view('post.show', compact("post","replys"));
  }
  public function edit(post $post)
 {
  // ログインしているユーザーの情報を取得
  $user = Auth::user();
  $id = $post->id;
  // 更新するpostのcorp_idとログインユーザーのcorp_idを比較
  $post_auth = post::find($id);
  if ($post_auth->corp != $user->cop_id) {
    // 不一致の場合はアクセスを拒否
    return redirect()->route('post.index');
  }
   return view('post.edit', compact('post'));
 }
 public function update(Request $request,$id)
{
  // ログインしているユーザーの情報を取得
  $user = Auth::user();

  // 更新するpostのcorp_idとログインユーザーのcorp_idを比較
  $post = post::find($id);
  if ($post->corp != $user->cop_id) {
    // 不一致の場合はアクセスを拒否
    return redirect()->route('post.index');
  }
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
    // ログインしているユーザーの情報を取得
  $user = Auth::user();

  // 更新するpostのcorp_idとログインユーザーのcorp_idを比較
  $post = post::find($id);
  if ($post->corp != $user->cop_id) {
    // 不一致の場合はアクセスを拒否
    return redirect()->route('post.index');
  }
          // Booksテーブルから指定のIDのレコード1件を取得
        $post = post::find($id);
          // レコードを削除
        $post->delete();
          // 削除したら一覧画面にリダイレクト
        return redirect()->route('post.index');
      }
}

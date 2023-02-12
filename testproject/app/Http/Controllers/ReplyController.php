<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\reply;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PostRequest;
use App\Post as pp;
use Illuminate\Support\Facades\Auth;


//on construction
class ReplyController extends Controller
{
    //
    
  public function store(Request $reply)
 {
   $attributes=$reply->only(["post","content"]);
   $id=$reply->only(["post"]);
   //操作すること
   $user = Auth::id();
   $corp=["corp" => User::find($user)->cop_id];
   $attributes= array_merge($attributes, $corp);
   //$attributeはphp array型に変換されているので、corpをappendすればよい。corpcontrollerにもやること
   $inserted=reply::create($attributes);
    return redirect()->route('post.show',$id);
  }

  public function edit(reply $reply)
 {
   return view('post.edit', compact('reply'));
 }
 public function update(Request $request,$id)
{
  $update=[
    "content"=>$request->content
  ];
  post::where("id",$id)->update($update);
  return redirect()->route('post.show',$id);
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

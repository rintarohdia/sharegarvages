<?php

namespace App\Http\Controllers;
use App\Models\corp;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\prefecture;
use Illuminate\Support\Facades\Log;
use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class corp_controller extends Controller
{
  public function index()
 {
    // DBよりBookテーブルの値を全て取得
    $corps=corp::all();
    // 取得した値をビュー「book/index」に渡す
    return view('corp.corp_index', compact('corps'));
  }
  public function create()
 {

    return view('corp.corp_make');
  }
  public function store(Request $request)
 {
   $attributes=$request->only(["corp_name","prefecture_id","CEO_name","capital","tel","mail"]);
   $inserted=corp::create($attributes);
   $id=$inserted->id;
   $user = ["creater"=> Auth::id()];
   corp::where("id",$id)->update($user);
    return redirect()->route('corp.index');
  }
  public function show(corp $corp)
 {
    return view('corp.corp_show', compact("corp"));
  }
  public function edit(corp $corp)
 {
   return view('corp.corp_edit', compact('corp'));
 }
 public function update(Request $request,$id)
{
  $update=[
    "corp_name"=>$request->corp_name,
    "prefecture_id"=>$request->prefecture_id,
    "CEO_name"=>$request->CEO_name,
    "capital"=>$request->capital,
    "tel"=>$request->tel,
    "mail"=>$request->email
  ];
  corp::where("id",$id)->update($update);
  return redirect()->route('corp.index',$id);
}
public function __construct(){
    $this->middleware('auth');
  }
public function destroy($id)
  {
          // Booksテーブルから指定のIDのレコード1件を取得
        $corp = corp::find($id);
          // レコードを削除
        $corp->delete();
          // 削除したら一覧画面にリダイレクト
        return redirect()->route('corp.index');
      }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Post;
use App\Models\CorpApply;
use App\Models\Corp;
use Illuminate\Support\Facades\Auth;

class CorpApplyController extends Controller
{
    //
    public function apply_form($id)
    {
       // DBよりBookテーブルの値を全て取得
       // 取得した値をビュー「book/index」に渡す
       $user = User::find($id);
       $this->authorize('view', $user);
       return view('users.corp_apply', compact('user'));
     }
     public function accept_apply(Request $request, $id){
        //
        $user = User::find($id);
        if ($user->id !== auth()->user()->id) {
            return redirect()->route('home')->with('error', '権限がありません');
        }
        $attributes=$request->only(["corp_id"]);
        $user_id=["user_id"=>$user->id];
        $attributes= array_merge($attributes, $user_id);
        CorpApply::create($attributes);
          return redirect()->route('users.show',$id)->with('成功', 'リクエストが送信されました');
     }
     public function controlpanel(corp $corp){
        if ($corp->creater !== auth()->user()->id) {
            return redirect()->route('home')->with('error', '権限がありません');
        }
        //idがcorp,crop_idと一致するものをcorp_applyとuserから抜き出して表示
        $users=User::where("cop_id",$corp->id)->get();
        $corp_applys=CorpApply::where("corp_id",$corp->id)->get();
        return view("corp_apply.controlpanel",compact("users","corp_applys"));
     }
     public function authorize_apply($id){
        $corp_apply = CorpApply::find($id);
        $attributes=["cop_id"=>$corp_apply->corp_id];
        User::where("id",$corp_apply->user_id)->update($attributes);
          // レコードを削除
        $corp_apply->delete();
     }
     public function reject_apply($id){
          // Booksテーブルから指定のIDのレコード1件を取得
        $corp_apply = CorpApply::find($id);
          // レコードを削除
        $corp_apply->delete();
     }
     public function releas($id){
        // Booksテーブルから指定のIDのレコード1件を取得
        $user = User::find($id);
        //idがcorp,crop_idと一致するものをcorp_applyとuserから抜き出して表示      
        $attributes=["cop_id"=>0];
        $id=$user->id;
        User::where("id",$id)->update($attributes);
      return redirect()->route('home');
}
}

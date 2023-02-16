登録待ち社員一覧</p>
@foreach($corp_applys as $corp_apply)
{{$corp_apply->user_rel->name}}
{{$corp_apply->user_rel->email}}
<form method="post"  action="/corp/{{$corp_apply->id}}/admit">
@csrf    
@method("PUT")
<button>認める</button>
</form>
<form method="post"  action="/corp/{{$corp_apply->id}}/admit">
@csrf
@method("delete")
<button>拒否する</button>
</form>
@endforeach
</p>
社員一覧
@foreach($users as $user)
<form method="post"  action="/corp/{{$user->id}}/releas">
@csrf
@method("delete")
{{$user->name}}
{{$user->email}}
<button>削除</button>
</form>
@endforeach

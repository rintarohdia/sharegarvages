{{ $user->name }}
{{ $user->email }}
{{ $user->corp->corp_name??"無所属"}}</p>
<a href="./{{$user->id}}/edit">名前編集</a></p>
<a href="./{{$user->id}}/applyform">会社変更</a>
<form action="{{ route('users.destroy', $user->id) }}" method="POST">
         @csrf
         @method("DELETE")
         <button type="submit" class="btn btn-danger">削除</button>
</form>
<a href="../corp/create">会社を新しく登録する</a>

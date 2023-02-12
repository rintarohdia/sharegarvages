{{ $user->name }}
{{ $user->email }}
{{ $user->corp->corp_name??"無所属"}}
<a href="./{{$user->id}}/edit">名前編集</a>
<form action="{{ route('post.destroy', $user->id) }}" method="POST">
         @csrf
         @method("DELETE")
         <button type="submit" class="btn btn-danger">削除</button>
</form>

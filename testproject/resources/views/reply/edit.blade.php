<form  method="post"  action="{{ route('reply.update',$reply) }}" >
  @csrf
  @method("PUT")
    投稿内容<input type="text" name="content" value="{{$reply->content}}">
  <button>変更</button>
</form>
<form action="{{ route('reply.destroy', $reply->id) }}" method="POST">
         @csrf
         @method("DELETE")
         <button type="submit" class="btn btn-danger">削除</button>
</form>

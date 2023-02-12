<form  method="post"  action="{{ route('post.update',$post) }}" >
  @csrf
  @method("PUT")
    投稿内容<input type="text" name="content" value="{{$post->content}}">
    <button>登録</button>
  </form>
  <button>変更</button>
</form>
<form action="{{ route('post.destroy', $post->id) }}" method="POST">
         @csrf
         @method("DELETE")
         <button type="submit" class="btn btn-danger">削除</button>
</form>

<form  method="post"  action="{{ route('reply.store') }}" method="POST">
@csrf
  
  内容<input type="text" name="content">
  <button>登録</button>
</form>

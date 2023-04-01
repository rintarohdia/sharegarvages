<body>
<h1>{{$post->corp_rel->corp_name}}</h1>
{{$post->prefecture_rel->prefecture_name}}
{{$post->content}}
{{$post->phpto??""}}
{{$post->post_time}}
<a href="./{{$post->id}}/edit">編集</a>
</p>
この投稿にreplyする。
<form  method="post"  action="{{ route('reply.store') }}" method="POST">
@csrf
    <input type="hidden" name="post" value="{{$post->id}}">
    内容<input type="text" name="content">
  <button>登録</button>
</form>

@foreach($replys as $reply)
<h2>{{$reply->corp_rel->corp_name}}</h2>
{{$reply->content}}
<a href="../reply/{{$reply->id}}/edit">編集</a>
@endforeach
</p>
<a href="../search">もどる</a>

</body>

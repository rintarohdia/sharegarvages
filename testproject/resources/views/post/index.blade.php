<body>
<h1>post</h1>
@foreach($posts as $post)
<h2>{{$post->corp}}</h2>
{{$post->content}}
{{$post->prefecture_rel->prefecture_name}}
{{$post->post_time}}
<a href="./post/{{$post->id}}">詳細</a>
@endforeach
</body>

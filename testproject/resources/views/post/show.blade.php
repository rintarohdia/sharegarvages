<body>
<h2>{{$post->corp_rel->corp_name}}</h2>
{{$post->prefecture_rel->prefecture_name}}
{{$post->content}}
{{$post->phpto??""}}
{{$post->post_time}}
<a href="./{{$post->id}}/edit">編集</a>
</body>

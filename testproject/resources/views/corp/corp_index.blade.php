<body>
<h1>会社一覧</h1>
@foreach($corps as $corp)
<h2>{{$corp->corp_name}}</h2>
{{$corp->CEO_name}}
{{$corp->capital}}
{{$corp->tel}}
{{$corp->mail}}
{{$corp->prefecture->prefecture_name}}
<a href="./corp/{{$corp->id}}">詳細</a>
@endforeach
</body>

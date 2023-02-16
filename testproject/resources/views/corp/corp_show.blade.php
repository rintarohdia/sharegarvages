<body>
<h2>{{$corp->corp_name}}</h2>
{{$corp->CEO_name}}
{{$corp->capital}}
{{$corp->tel}}
{{$corp->mail}}
{{$corp->prefecture->prefecture_name}}
<a href="./{{$corp->id}}/edit">編集</a>
<a href="./{{$corp->id}}/controlpanel">コントロールパネル</a>
</body>

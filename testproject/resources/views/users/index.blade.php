<body>
@foreach($users as $user)
<h2>{{$user->name}}</h2>
<a href="./users/{{$user->id}}">詳細</a>
@endforeach
</body>

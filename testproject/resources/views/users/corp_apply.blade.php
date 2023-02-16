変更する会社の数字を淹れてください</p>
<form method="post"  action="{{ route('users.applyform',$user) }}">
@csrf
<input type="number" name="corp_id"></input>
<button>送信</button>
</form>
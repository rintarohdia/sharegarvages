<form  method="post"  action="{{ route('users.update',$user) }}" >
  @csrf
  @method("PUT")
  <input type="" value="{{$user->name}}">
    <button>登録</button>
  </form>
</form>


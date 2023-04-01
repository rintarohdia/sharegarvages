<form action="{{ route('post.search') }}" method="GET">
  <input type="text" name="search" value="{{ $search }}">
  <button type="submit">検索</button>
</form>

<!-- 投稿一覧 -->
@if(count($posts) > 0)
  <ul>
    @foreach($posts as $post)
    <h2>{{$post->corp_rel->corp_name}}</h2>
        {{$post->content}}
        </p>
        {{$post->prefecture_rel->prefecture_name}}
        {{$post->post_time}}
        @if($post->photo_exist)
        <img src="{{ asset("storage/".(string)$post->id.".jpg") }}">
        @endif
    @endforeach
  </ul>
@else
  <p>投稿がありません。</p>
@endif
@extends("layout")
@section("title", "Laravel掲示板")
@section("content")
<div class="container">
  <div class="form-group">
    <form method="post" action="{{route('threads.store')}}">
      @csrf
      @error("title")
        <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <input type="text" name="title">
      <input type="submit" value="新規作成" class="btn btn-success">
    </form>
  </div>
</div>
<div class="container">
  <h1>スレッド一覧</h1>
  <div class="container">
    @foreach ($threads as $thread)
    <div>
      <span><a href="{{route('threads.show', ['thread'=>$thread])}}">{{$thread->title}}</a>&nbsp;&nbsp;({{$thread->posts->count()}})</span>
      <p style="color:#8888">{{$thread->updated_at->format("Y-m-d H:i")}}</p>
    </div>
    @endforeach
  </div>
</div>

@endsection

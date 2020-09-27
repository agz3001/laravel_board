@extends("layout")
@section("title", "$thread->title")
@section("content")
<div class="container">
  <div>
    <a href="{{route('top')}}">一覧に戻る</a>
    <h1 style="text-align:center;">{{$thread->title}}</h1>
  </div>

  <div class="form-group">
    <form method="post" action="{{route('posts.store')}}">
      @csrf
      <input type="hidden" name="thread_id" value="{{$thread->id}}">
      <label for="title">ハンドルネーム</label><br>
      @error("title")
        <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <input id="title" type="text" name="title" value="{{old('title')}}" class="form-control">
      <label for="body">投稿内容</label><br>
      @error("body")
        <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <textarea id="body" name="body" rows="4" class="form-control">{{old('body')}}</textarea>
      <input type="submit" value="投稿する" class="btn btn-primary">
    </form>
    <hr>
  </div>
  <div class="container">
    <div id="res-popup-container" class="res-popup-content"></div><!--ポップアップコンテナ-->
    <div>
      @foreach ($thread->posts as $post)
      <div>
        <div class="comment">
        <span>{{$loop->iteration}}.&nbsp;</span><!--連番機能！！-->
        <span><b style="color:green;">{{$post->title}}</b>&nbsp;&nbsp;&nbsp;&nbsp;{{$post->created_at->format("Y/m/d H:i:s")}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID: </span>
        <div>
            <?php
            if (preg_match("/>+\d{1,3}/", $post->body)){
              $num =substr($post->body, 0, 4);
              //$string =htmlspecialchars_decode($num, ENT_HTML5);
              $num1 =substr($num, 2, 4);
              $pattern ="/>+\d{1,3}/";
              $replacement ="<p class='res-anchor' data-resid='$num1'>".$num."</p>";
              $preg =preg_replace($pattern, $replacement, $post->body);
              echo nl2br($preg);

            } else {
              echo nl2br(htmlspecialchars($post->body));
            }
            ?>
            {{-- HTMLタグ無効化してから、改行を<br>変換  --}}
            {{--!! nl2br(htmlspecialchars($post->body)) !!--}}

        </div>
        </div>
      </div>
      <hr>
      @endforeach
    </div>
  </div>

</div>

@endsection

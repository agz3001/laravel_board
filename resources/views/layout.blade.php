<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield("title")</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="{{secure_asset('js/style.js')}}"></script>
</head>
<body style="background-color:whitesmoke;">
  <div class="container">
    @yield("content")
  </div>
  <script>
  var selComment ='.comment';
  jqResAnchor = $('.res-anchor');    // コメレスアンカーのjQueryオブジェクトを取得
      // コメレスアンカーのイベントにバインド
      jqResAnchor.on({
          'mousemove': function(eventObject) {
              $('#res-popup-container').css({    // ポップアップコンテナの位置決め
                  'top':    eventObject.pageY + 20 + 'px'
                  , 'left': eventObject.pageX + 20 + 'px'
              });
          }
          , 'mouseenter': function() {
              jqResTarget = $(selComment).eq($(this).data('resid')-1);    // 参照先のjQueryオブジェクトを取得
              if (jqResTarget[0]) {    // 参照先が存在したら
                  $('#res-popup-container')         // ポップアップコンテナ
                      .html(jqResTarget.html())       // 内容書き換え
                      .addClass('res-popup-on')       // 表示
                  ;
              }
          }
          , 'mouseleave': function() {
              $('#res-popup-container')         // ポップアップコンテナ
                  .removeClass('res-popup-on')    // 非表示
                  .empty()                        // 内容削除
              ;
          }
      });
  </script>
  <footer>
    <!-- jQuery、Popper.js、Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </footer>
</body>
</html>

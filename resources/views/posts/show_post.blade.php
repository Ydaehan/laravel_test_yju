<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>게시글 상세보기</title>
</head>
<body>
  <div>
    제목 : {{ $post->title }}
  </div>
  <div>
    내용 : <pre style="display: inline-flex">{{ $post->content }}</pre>
  </div>
  <div>
    작성자 : {{ $post->user_id }}
  </div>
  <div>
    생성일 : {{ $post->created_at }}
  </div>
  <div>
    수정일 : {{ $post->updated_at }}
  </div>
  <div>
    <form style="display:inline-block" action="/posts/{{ $post->id }}/edit" method="get">
      <input type="submit" value="수정">
    </form>
    <form style="display:inline-block" action="/posts/{{ $post->id }}" method="post" onsubmit="return confirmDelete()">
      @csrf
      @method("delete")
      <input type="submit" value="삭제">
    </form>
  </div>

  <script>
    function confirmDelete() {
      return confirm('정말로 삭제하시겠습니까?');
    }
  </script>
</body>
</html>
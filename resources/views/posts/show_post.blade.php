<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>게시글 상세보기</title>
</head>
<body>
  <div><a href="/posts">목록보기로 돌아가기</a></div>
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
  <hr />
  <h4>댓글 등록</h4>
  <form action="/posts/{{ $post->id }}/comments" method="post">
    @csrf
    <div>
      <textarea name="content" required rows="1" cols="50"></textarea>
    </div>
    <input  type="submit" value="댓글등록">
  </form>
  <h2>댓글 리스트({{$post->comments->count()}}개)</h2>
  <table style="table-layout: auto; border-collapse: separate;">
    <tr>
      <th>연번</th>
      <th>내용</th>
      <th>작성자</th>
      <th>작성일</th>
    </tr>
    @foreach ($post->comments()->orderBy('created_at','desc')->get() as $comment)
    <tr>
      <form action="/posts/{{ $post->id }}/comments/{{ $comment->id }}" method="post">
        @csrf   
          <td>{{$loop->index+1}}</td>
          <td><input type="text" name="content" value="{{ $comment->contents }}"></td>
          <td>{{$comment->user_id}}</td>
          <td>{{$comment->created_at}}</td>
          <td><input type="submit" value="수정"></td>
      </form>
      <form action="/posts/{{ $post->id }}/comments/{{ $comment->id }}" method="post">
        @csrf
        @method('delete')
        <td><input type="submit" onclick="send_delete()" value="삭제"></td>
      </form>
    </tr>
    @endforeach
    
  </table>





  <script>
    function confirmDelete() {
      return confirm('정말로 삭제하시겠습니까?');
    }

    function send_delete() {
      //console.log('send_delete called');
      const result = confirm('Are you sure?');
      if (result == false) {
        return false;
      }

      // 이 HTML 문서에서 이름이 _method인 DOM 객체를 찾아서 
      // 그 객체의 value 값을 'delete'로 변경하고 return true 하면
      // 서버로 요청이 발송된다
      return true;
    }
  </script>
</body>
</html>
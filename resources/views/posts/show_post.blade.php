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
  <hr />
  <h4>댓글 등록</h4>
  <form action="/posts/{{ $post->id }}/comments" method="post">
    @csrf
    <div>
      <textarea name="content" cols="1" rows="30"></textarea>
    </div>
    <input type="submit" value="댓글등록">
  </form>
  <h2>댓글 리스트({{$??}}개)</h2>
  <table>
    <tr>
      <th>연번</th>
      <th>내용</th>
      <th>작성자</th>
      <th>작성일</th>
    </tr>
    @foreach ($?? as $comment)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$contetn->content}}</td>
        <td>{{$contetn->user_id}}</td>
        <td>{{$contetn->created_at}}</td>
      </tr>
        
    @endforeach
  </table>
  <script>
    function confirmDelete() {
      return confirm('정말로 삭제하시겠습니까?');
    }
  </script>
</body>
</html>
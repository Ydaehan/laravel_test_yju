<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>post_list</title>
</head>
<body>
  <h2>게시글리스트</h2>
  <table>
    <th>연번</th><th>제목</th><th>작성자</th><th>작성일</th>
      @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->index+1 }}</td>
          <td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
          <td>홍길동</td>
          <td>{{ $post->created_at }}</td>
        </tr>  
      @endforeach
  </table>
</body>
</html>
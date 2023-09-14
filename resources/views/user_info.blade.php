<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @if (count($user) == 0)
    <h2>Missing UserData</h2>
  @else
    <h2>UserData</h2>
    Name: {{ $user['name'] }}<br> 
    BirthDate: {{  $user['birthDate'] }}<br>
    E-Mail: {{ $user['email'] }}<br><br>
    <form method="post" action="/users/{{ $user['id'] }}">
      @csrf
      @method("delete")
      <input type="submit" value="삭제">
    </form>
    $nbsp;$nbsp;
    <a href="/users/{{ $user['id'] }}/edit">
      <input type="submit" value="수정">
    </a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form method="post" action="/users/{{ $user['id'] }}">
    @csrf
    @method('put')
    <div>
      <label>이름:</label>
      <input type="text" name="name" value="{{ $user['name'] }}" readonly>
    </div>
    <div>
      <label>생년월일(YYYY/MM/DD):</label>
      <input type="text" name="birthday" value="{{ $user['birthDate'] }}" readonly>
    </div>
    <div>
      <label>email:</label>
      <input type="email" name="email" value="{{ $user['email'] }}">
    </div>
    <button type="submit">수정</button>
  </form>
</body>
</html>
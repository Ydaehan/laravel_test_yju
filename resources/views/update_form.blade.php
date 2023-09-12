<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form method="post" action="/update">
    @csrf
    @method('put')
    <div>
      <label>이름:</label>
      <input type="text" name="name" value="고길동" readonly>
    </div>
    <div>
      <label>생년월일(YYYY/MM/DD):</label>
      <input type="text" name="birthday" value="1980/02/25" readonly>
    </div>
    <div>
      <label>email:</label>
      <input type="email" name="email">
    </div>
    <div>
      <label>소속:</label>
      <input type="text" name="affliation">
    </div>
    <button type="submit">등록</button>
  </form>
</body>
</html>
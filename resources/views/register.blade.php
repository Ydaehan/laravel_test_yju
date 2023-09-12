<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  {{-- {{ $response }} --}}
  <h1>축하합니다~ 회원으로 등록되었습니다!</h1>
  <h2>{{ $name }}님의 등록 정보는 아래와 같습니다</h2>
  <h3>이메일: {{ $email }}</h3>
  <h3>생년월일: {{ $birthday }}</h3>
  <h3>소속: {{ $affliation }}</h3>
</body>
</html>
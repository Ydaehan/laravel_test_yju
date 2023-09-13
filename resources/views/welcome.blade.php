<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <div>
            <a href="/users/create">Sign Up</a>
        </div>
        <div>
            <a href="/users">View Users List</a>
            @foreach ($users as $user)
                <div>
                    <a href="/users/{{ $user['id'] }}">
                    이름: {{ $user['name'] }}
                    </a>
                    &nbsp;&nbsp;
                    이메일: {{ $user['email'] }}
                </div>
                {{-- <p>This is user {{ $user['id'] }}</p> --}}
            @endforeach
        </div>
    </body>
</html>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    static protected $users = [
        ['id'=>1, 'name'=>'고길동', 'birthDate'=>'1999/01/02', 'email'=>'gdgo@gmail.com'], 
        ['id'=>2, 'name'=>'홍길동', 'birthDate'=>'1998/06/02', 'email'=>'gdh@gmail.com'], 
        ['id'=>3, 'name'=>'박동훈', 'birthDate'=>'1599/05/02', 'email'=>'dhp@gmail.com'], 
        ['id'=>4, 'name'=>'박찬호', 'birthDate'=>'1699/02/02', 'email'=>'chp@gmail.com'], 
        ['id'=>5, 'name'=>'박문수', 'birthDate'=>'1990/07/02', 'email'=>'msp@gmail.com']
    ];
    public function index()
    {
        /*  1. DB에서 사용자 정보를 가져온다. 
            2. 가져온 사용자 정보를 blade 파일에 넘겨주면서 실행한다.
        */
        // DB에서 읽어온 정보를 $users 변수에 할당했다고 가정
        
        return view('welcome', ['users'=>UserController::$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        /*  1. Request 객체로부터 사용자가 폼에 입력한 값을 꺼낸다
            2. 1에서 꺼낸 값을 DB에 넣는다
            3. 등록결과 페이지를 만들어서 반환한다 */
        $userData = $req->only("name","email","birthday","affliation");
        return view('/register',['name'=>$userData['name'], 'email'=>$userData['email'], 'birthday'=>$userData['birthday'], 'affliation'=>$userData['affliation']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /* 
            1. $id를 가지고 DB에서 레코드 하나를 인출한다.
            2. 인출된 그 정보를 변수 $user에 할당 
            3. 그 $user 값을 blade 에 전달하면서 실행.*/
            $userFound = null;
            foreach (UserController::$users as $user) {
                if($user["id"] == $id) {
                    $userFound = $user;
                    break;
                }
            }
            // $userFound : ['id'=>1, 'name'=>'고길동',...]
            // 못 찾았으면 $userFound는 null 값을 가질텐데,
            // 이 때 null 대신에 빈 배열 []를 블레이드 파일에 넘겨주자.
            $userFound = $userFound!=null? $userFound : [];
            return view('user_info', ['user'=>$userFound]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        /*  1. $id 값에 해당하는 사용자 정보를 DB에서 읽어온다.
            2. 읽어온 그 사용자 정보를 blade 파일에 넘겨주면서
               그 blade를 실행. */
        $userFound = null;
        foreach (UserController::$users as $user) {
            if($user["id"] == $id) {
                $userFound = $user;
                break;
            }
        }
        // $userFound : ['id'=>1, 'name'=>'고길동', ...]
        return view('update_form', ['user'=>$userFound]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        /*  1. Request 객체에서 사용자가 입력한 값을 빼와야 된다.
            2. 위에서 빼온 값으로 $id에 해당하는 DB 레코드를 찾아서 update를 한다.
            3. 사용자 상세보기 view로 연결시켜 준다.*/
        $name = $req->input("name");
        $birthDate = $req->input("birthDate");
        $email = $req->input("email");

        for($i=0; $i < sizeof(static::$users); $i++)
        {
            if (static::$users[$i]["id"] == $id) {
                static::$users[$i]['name'] = $name;
                static::$users[$i]['birthDate'] = $birthDate;
                static::$users[$i]['email'] = $email;
                $updatedUser = static::$users[$i];
                break;
            }
        }

        return redirect("/users/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. PRIMARY KEY 속성갑으로 $id값을 가지는
        // 레코드를 DB에서 찾아서 삭제
        // 2. 리스트페이지 생성후 반환
        for($i=0; $i < sizeof(static::$users); $i++) {
            if(static::$users[$i]["id"] == $id) {
                unset(static::$users[$i]);
            }
        }


        return redirect("/users");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function test() : View {
        return view('welcome');
    }

    public function create() : View {
        return view('register_form');
    }
    
    public function store(Request $req): View {
        $userData = $req->only("name","email","birthday","affliation");
        return view('register',['name'=>$userData['name'], 'email'=>$userData['email'], 'birthday'=>$userData['birthday'], 'affliation'=>$userData['affliation']]);
    }

    public function edit() : View{
        return view('update_form');
    }

    public function update(Request $req) : View {
        $userData = $req->only("name","email","birthday","affliation");
        return view('update',['name'=>$userData['name'], 'email'=>$userData['email'], 'birthday'=>$userData['birthday'], 'affliation'=>$userData['affliation']]);
    }

    public function index() : View {
        return view('remove_form');
    }

    public function destroy(Request $req) : View {
        $deleteData = $req->input("name");
        return view('remove',['name'=> $deleteData]);
    }
}

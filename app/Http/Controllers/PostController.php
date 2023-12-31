<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 리스트를 보여주는 기능을 수행
        // DB의 posts 테이블의 레코드들을 읽어온다.
        // $posts = Post::all(); // posts 테이블의 모든 레코드들을 읽어온다.

        // posts객체에 collection 이라는 집합 자료형으로 반환해준다.
        // select * from posts;

        $posts = Post::orderByDesc("created_at")->get();

        // $count = Post::count();

        $count = $posts->count();
        
        // 그렇게 읽어온 레코드들을 뷰페이지에 전달한다.
        return view('posts.post_list',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.register_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $title = $request->input('title');
        // $title = $request->title;
        // $content = $request->content;

        // $post = new Post();
        // $post->title = $title;
        // $post->content = $content;
        // $post->user_id = 1; // 로그인 기능 구현 전까지 하드 코딩

        // $post->save();

        // dd($request->all());
        // Post::create(['title'=>$title,'content'=>$content, 'user_id'=>2]);
        // $request->input('user_id',1);

        $request->merge(['user_id'=> 1]);
        // dd($request->all());

        Post::create($request->all());
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // DB의 posts 테이블에서 id 컬럼값으로 $id 값을 가지는 레코드를 읽어온다.
        // 읽어온 그 레코드를 블레이드 뷰 파일에 전달한다.
        // $post = Post::find($id); // select * from posts where id = $id;
        
        $post = Post::findOrFail($id);

        // $post = Post::Where('id',$id)->first();

        // $post = Post::firstWhere('id', $id);

        // dd($post[0]->title); // die & dump
        // Post::where('id', '>', $id)  ; // select * from posts where id > $id;
        // select * from posts where id > $id and name = '홍길동';
        // Post::where('id' > $id)->where('name','홍길동')->get();

        // select * from posts where id > $id or name = '홍길동';
        // Post::where('id > $id)->orWhere('name','홍길동')->get();

        return view('posts.show_post',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // DB posts 테이블에서 id 컬럼의 값이 $id인 레코드를 인출
        $post = Post::find($id); // select * from posts where id = $id
        // 그 레코드를 편집 폼 페이지를 생성하는 블레이드에게 전달

        return view('posts.edit_post',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // DB posts 테이블에서 id 칼럼의 값이 $id인 레코드를 찾아서
        // 사용자가 입력한 title, content로 변경해준다.
        // update posts set title=?,content=? where id = ?
        // $post = Post::find($id);

        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        // Post::where('id',$id)->update(['title'=>$request->title, 'content'=>$request->content]);
        // update는 모델 클래스의 화이트 리스트와 블랙 리스트를 참조하지 않는다
        // 연관 배열에 있는 모든 키를 변경할 컬럼이름으로 간주하고 update 문을 생성해 실행한다.
        Post::where('id',$id)->update(['title'=>$request->title, 'content'=>$request->content]);
        // Post::where('id',$id)->update($request->except('_token', '_method'));
        // update posts set title=?, content=? where id=?
        // 상세보기 페이지로 리다이렉트 한다.

        return redirect('/posts/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DB posts 테이블에서 id 칼럼 값이 $id 인 레코드를 삭제한다.
        Post::destroy($id); // delete from 

        // posts 리스트 보기
        return redirect('/posts');
    }
}

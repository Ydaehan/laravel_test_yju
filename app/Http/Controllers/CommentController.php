<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $post_id)
    {
        // $request에서 content를 추출하고 comments 테이블에 하나의 레코드로 삽입
        $content = $request->content;
        // Eloquent Model Comment을 이용해 DB에 삽입하는 방법
        // 1. Comment 객체 생성 후, save 메서드 호출
        // 또는
        // 2. Comment::create 메서드 호출, 대량할당을 위해 $fillable property 또는 $guarded 정의 필요
        Comment::create([
            'content'=>$content,
            'user_id'=>1, // 지금은 하드코딩, 회원관리 기능 구현될 때 까지는,
            'post_id'=>$post_id,
        ]);
        // 게시글 상세보기 페이지 뷰로 redirection
        return redirect('/posts'.$post_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentController extends Controller
{
    public function index()
    {
        return Inertia::render('Comments', [
            'comments' => Comment::all()
                ->transform(fn (Comment $comment) => [
                    'id' => $comment->id,
                    'name' => $comment->name,
                    'content' => $comment->content,
                    'created_at' => $comment->created_at->format('Y/m/d H:i'),
                ]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'content' => 'required',
        ], [
            'name.required' => '請輸入姓名',
            'content.required' => '請輸入留言',
        ]);

        Comment::create($data);

        return back();
    }
}

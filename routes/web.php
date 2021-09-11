<?php

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('about', function () {
    return Inertia::render('About', [
        'name' => 'Lucas',
    ]);
});

Route::get('comments', function () {
    return Inertia::render('Comments', [
        'comments' => Comment::all()
            ->transform(fn (Comment $comment) => [
                'id' => $comment->id,
                'name' => $comment->name,
                'content' => $comment->content,
                'created_at' => $comment->created_at->format('Y/m/d H:i'),
            ]),
    ]);
});

Route::post('comments', function (Request $request) {
    $data = $request->validate([
        'name' => 'required',
        'content' => 'required',
    ], [
        'name.required' => '請輸入姓名',
        'content.required' => '請輸入留言',
    ]);

    Comment::create($data);

    return back();
});

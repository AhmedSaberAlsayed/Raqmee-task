<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\commentRequest;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function show($id)
    {
        $post = $this->commentRepository->findPostById($id);
        return view('dashboard.posts.addcomments', compact('post'));
    }

    public function store(commentRequest $request, $id)
    {
        $author = Auth::user()->name;

        $this->commentRepository->create([
            'post_id' => $id,
            'author' => $author,
            'content' => $request->body,
        ]);

        return back()->with('success', 'Comment added successfully!');
    }
}

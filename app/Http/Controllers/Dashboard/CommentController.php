<?php 

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $author = Auth::user()->name;

        $this->commentRepository->create([
            'post_id' => $id,
            'author' => $author,
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Comment added successfully!');
    }
}

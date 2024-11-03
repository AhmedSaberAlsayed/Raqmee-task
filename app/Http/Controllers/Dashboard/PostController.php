<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Traits\ImagesTrait;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    use ImagesTrait;

    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
{
    $query = $request->input('query');
    $posts = $query ? $this->postRepository->search($query) : $this->postRepository->all();

    return view('dashboard.posts.index', compact('posts'));
}

    public function show()
    {
        $id = Auth::user()->id;
        $posts = $this->postRepository->getByUserId($id);
        return view('dashboard.posts.show', compact('posts'));
    }

    public function create()
    {
        return view('dashboard.posts.create');
    }

    public function store(PostRequest $request)
    {
        $id = Auth::user()->id;
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $this->uploadimg($request->image, $filename, 'posts');
        $data = [
            'title' => $request->title,
            'content' => $request->body,
            'image' => $filename,
            'user_id' => $id,
        ];

        $this->postRepository->create($data);

        return redirect()->route('dashboard.posts.index')->with('success', 'Post created successfully');
    }

    public function edit($id)
    {
        $post = $this->postRepository->find($id);
        return view('dashboard.posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $user_id = Auth::user()->id;
        $post = $this->postRepository->find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $this->uploadimg($image, $filename, "posts", $post->image);
        } else {
            $filename = str_replace("images/posts/", '', $post->image);
        }

        $data = [
            'title' => $request->title,
            'content' => $request->body,
            'image' => $filename,
            'user_id' => $user_id,
        ];

        $this->postRepository->update($id, $data);

        return redirect()->route('dashboard.posts.show')->with('success', 'Post updated successfully');
    }
    public function destroy($id)
    {
        $this->postRepository->delete($id);
        return redirect()->route('dashboard.posts.show')->with('success', 'Post deleted successfully');
    }
}

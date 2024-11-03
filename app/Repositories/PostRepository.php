<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function all()
    {
        return Post::with("user")->orderBy('created_at', 'desc')->get();
    }

    public function getByUserId($userId)
    {
        return Post::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function find($id)
    {
        return Post::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $post = $this->find($id);
        $post->update($data);
        return $post;
    }

    public function delete($id)
    {
        $post = $this->find($id);
        unlink(public_path($post->image));
        return $post->delete();
    }

    public function search( $query)
    {
        $posts = Post::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();
        return $posts;
    }
}

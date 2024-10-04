<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Comment;

class CommentRepository
{
    /**
     * Create a new comment.
     *
     * @param array $data
     * @return Comment
     */
    public function create(array $data)
    {
        return Comment::create($data);
    }

    /**
     * Find a post by ID.
     *
     * @param int $postId
     * @return \App\Models\Post|null
     */
    public function findPostById($postId)
    {
        return Post::find($postId);
    }
}

<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }

    public function viewAny(User $user, Post $post)
    {
        // Example: Allow if the user has 'view posts' permission
        return $user->can('view posts');
    }

    public function create(User $user, Post $post)
    {
        // Example: Allow if the user has 'view posts' permission
        return $user->can('create posts');
    }

    public function update(User $user, Post $post)
    {
        // Example: Allow if the user owns the post or has 'edit posts' permission
        return $user->id === $post->user_id || $user->can('edit posts');
    }

    public function delete(User $user, Post $post)
    {
        // Example: Allow if the user has 'delete posts' permission
        return $user->can('delete posts');
    }
}

<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the flag.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return true;
    }
    /**
     * Determine whether the user can create flag.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function create(User $user, Post $post)
    {
        if ($user->admin == 1)
        {
            return true;
        }
    }
    /**
     * Determine whether the user can update the flag.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        if ($user->admin == 1)
        {
            return true;
        }
    }
    /**
     * Determine whether the user can delete the flag.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        if ($user->admin == 1)
        {
            return true;
        }

    }
}

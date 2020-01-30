<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Article;
use App\User;

class ArticlePolicy
{
    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return bool
     */
    public function update(User $user, Article $article)
    {
        return $user->id === $article->user_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
    }

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return bool
     */
    public function delete(User $user, Article $article)
    {
        return $user->id === $article->user_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
    }
}

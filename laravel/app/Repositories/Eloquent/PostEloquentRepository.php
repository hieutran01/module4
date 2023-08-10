<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\PostRepositoryInterface;

class PostEloquentRepository extends EloquentRepository implements PostRepositoryInterface
{
    public function getModel()
    {
        return Post::class;
    }
}
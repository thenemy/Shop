<?php

namespace App\Domain\Comments\Api;

use App\Domain\Comments\Entities\CommentProduct;
use App\Domain\User\Entities\User;

class CommentApi extends CommentProduct
{
    public function toArray()
    {
        return [
            "id" => $this->id,
            "name" => $this->user->avatar->name,
            "mark" => $this->product->mark()->where("user_id", $this->user_id)->first()->mark,
            "created_at" => $this->created_at,
            "message" => $this->message,
            "num_likes" => $this->likes()->count(),
            "num_dislikes" => $this->dislikes()->count()
        ];
    }
}

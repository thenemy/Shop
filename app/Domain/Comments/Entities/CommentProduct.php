<?php

namespace App\Domain\Comments\Entities;

use App\Domain\Comments\Builders\CommentBuilder;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\User\Traits\HasUserRelationship;

class CommentProduct extends Entity
{
    use HasUserRelationship;
    protected $table = "comment_product";
    public function newEloquentBuilder($query)
    {
        return new CommentBuilder($query);
    }

    public function product(){
        return $this->belongsTo(Product::class, "product_id");
    }
}

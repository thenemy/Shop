<?php

namespace App\Http\Controllers\Api\CommentAndMark;

use App\Domain\Comments\Services\CommentProductService;
use App\Domain\Comments\Services\MarkProductService;
use App\Domain\Product\Product\Entities\Product;
use App\Http\Controllers\Api\Base\ApiController;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ProductCommentMarkController extends ApiController
{
    public MarkProductService $markProductService;
    public CommentProductService $commentProductService;

    public function __construct()
    {
        $this->markProductService = new MarkProductService();
        $this->commentProductService = new CommentProductService();
    }

    public function leftComment(Request $request, Product $product)
    {
        $mark = "digits_between:1,5";
        if (!$product->mark()->where("user_id", auth()->user()->id)->exists()) {
            $mark = $mark . "|" . "required";
        }
        $request->validate([
            "message" => "required",
            "mark" => $mark
        ]);
        $this->saveResponse(function () use ($request, $product) {
            $condition = [
                'user_id' => auth()->user()->id,
                "product_id" => $product->id
            ];
            $this->markProductService->updateOrCreate($condition, $request->all());
            $this->commentProductService->create($request->all());
        });
    }
}

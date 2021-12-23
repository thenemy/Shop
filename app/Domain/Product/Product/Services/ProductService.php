<?php

namespace App\Domain\Product\Product\Services;

use App\Domain\Core\Main\Services\BaseService;
use App\Domain\File\Traits\FileUploadService;
use App\Domain\Product\Images\Services\ImageService;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\Product\Product\Interfaces\ProductInterface;
use Illuminate\Support\Facades\DB;

class ProductService extends BaseService implements ProductInterface
{
    use FileUploadService;

    private ImageService  $imageService;

    public function __construct()
    {
        parent::__construct();
        $this->imageService = ImageService::new();
    }

    public function getEntity(): Product
    {
        return new Product();
    }

    public function create(array $object_data)
    {

        try {
            DB::beginTransaction();
            $this->serializeTempFile($object_data);
            $image_data = $this->popCondition($object_data, self::IMAGE_SERVICE);
            $product =  parent::create($object_data);
            $product->image_product->upload($image_data['image']);
            DB::commit();
            return $product;
        }catch (\Throwable $exception) {
            DB::rollBack();
            throw  $exception;
        }

    }

    public function update($object, array $object_data): \App\Domain\Core\Main\Entities\Entity
    {
        try {
            DB::beginTransaction();
            $product =  parent::update($object, $object_data);
            DB::commit();
            return $product;
        }catch (\Throwable $exception) {
            DB::rollBack();
            throw  $exception;
        }


    }
}

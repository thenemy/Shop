<?php

namespace App\Domain\Product\Product\Services;

use App\Domain\Core\Main\Services\BaseService;
use App\Domain\File\Traits\FileUploadService;
use App\Domain\Product\Color\Entities\ProductManyColor;
use App\Domain\Product\Color\Services\ProductMainService;
use App\Domain\Product\Header\Services\HeaderService;
use App\Domain\Product\Images\Services\ImageService;
use App\Domain\Product\Product\Entities\CardImage;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\Product\Product\Entities\ProductHit;
use App\Domain\Product\Product\Entities\ProductOfDay;
use App\Domain\Product\Product\Interfaces\ProductInterface;
use Illuminate\Support\Facades\DB;

class ProductService extends BaseService implements ProductInterface
{
    use FileUploadService;

    private CardImageService $cardImage;
    private HeaderService $headerService;
    private ProductMainService $colorService;

    public function __construct()
    {
        parent::__construct();
        $this->cardImage = CardImageService::new();
        $this->headerService = HeaderService::new();
        $this->colorService = ProductMainService::new();
    }

    public function getEntity(): Product
    {
        return new Product();
    }

    private function createCheck(array $object_data, Product $product, string $class)
    {
        $product_day = false;
        $object = $class::where("product_id", "=", $product->id);
        $exists = $object->exists();
        if (array_key_exists("checked", $object_data) && !$exists) {
            $product_day = true;
        } else if (!array_key_exists("checked", $object_data) && $exists) {
            $object->delete();
        }
        if ($product_day)
            $class::create(['product_id' => $product->id]);
    }

    public function create(array $object_data)
    {

        try {
            DB::beginTransaction();
            $this->serializeTempFile($object_data);
            $image_data = $this->popCondition($object_data, self::IMAGE_SERVICE);
            $card_image = $this->popCondition($object_data, self::CARD_IMAGE_SERVICE);
            $product_of_day = $this->popCondition($object_data, self::PRODUCT_DAY_SERVICE);
            $product_hit = $this->popCondition($object_data, self::PRODUCT_HIT_SERVICE);
            $main_credits = collect($this->popCondition($object_data, self::MAIN_CREDIT_SERVICE))->collapse()->toArray();
            $headers = $this->popCondition($object_data, self::BODIES_SERVICE);
            $colors = $this->popCondition($object_data, self::COLORS_SERVICE);
            $this->popCondition($object_data, self::COLORS_TEMP);
            $product = parent::create($object_data);
            $product_id = ['product_id' => $product->id];
            $this->colorService->createMany($colors, $product_id, 0);
            $this->headerService->createIfExists($headers, $product_id);
            $product->image_product->upload($image_data['image']);
            $card_image['product_id'] = $product->id;
            $this->createCheck($product_of_day, $product, ProductOfDay::class);
            $this->createCheck($product_hit, $product, ProductHit::class);
            $main_credit = self::MAIN_CREDIT_SERVICE;
            $product->$main_credit()->attach($main_credits);
            $this->cardImage->create($card_image);
            DB::commit();
            return $product;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw  $exception;
        }

    }

    public function update($object, array $object_data): \App\Domain\Core\Main\Entities\Entity
    {
        try {
            DB::beginTransaction();
            $this->serializeTempFile($object_data);
            $product_of_day = $this->popCondition($object_data, self::PRODUCT_DAY_SERVICE);
            $product_hit = $this->popCondition($object_data, self::PRODUCT_HIT_SERVICE);
            $headers = $this->popCondition($object_data, self::BODIES_SERVICE);
            $colors = $this->popCondition($object_data, self::COLORS_SERVICE);
            $parent = ['product_id' => $object->id];
            $this->headerService->createOrUpdate($object, self::BODIES_SERVICE, $headers, $parent);

            $this->colorService->createOrUpdateMany($colors, $parent, 0);
            if ($object instanceof Product) {
                $this->createCheck($product_of_day, $object, ProductOfDay::class);
                $this->createCheck($product_hit, $object, ProductHit::class);
            }
            $product = parent::update($object, $object_data);
            DB::commit();
            return $product;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw  $exception;
        }
    }
}

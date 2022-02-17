<?php


namespace App\Domain\Category\Services;


use App\Domain\Category\Entities\Category;
use App\Domain\Category\Entities\DeliveryCategory;
use App\Domain\Category\Interfaces\CategoryRelationInterface;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\File\Traits\FileUploadService;
use App\Domain\Product\ProductKey\Entities\ProductKey;
use App\Domain\Product\ProductKey\Services\ProductKeyService;
use Illuminate\Support\Facades\DB;

class CategoryService extends BaseService implements CategoryRelationInterface
{
    use FileUploadService;

    public IconCatService $service;
    public ProductKeyService $productKeyService;

    public function __construct()
    {
        parent::__construct();
        $this->service = new IconCatService();
        $this->productKeyService = new ProductKeyService();
    }

    public function getEntity(): Category
    {
        return new Category();
    }

    public function incrementHeight($category)
    {
        if ($category->height == 0) {
            // minus one because height become correct number of nested child depth = 2
            // parent height = 1
            $category->height++;
            $category->save();
            while ($category->parent_id != null) {
                $category = $category->parent;
                $category->height++;
                $category->save();
            }
        }
    }

    public function decrementHeight($category)
    {
        if ($category && !$category->childsCategory()->exists()) {
            $category->height--;
            $category->save();
            while ($category->parent_id != null) {
                $category = $category->parent;
                $category->height--;
                $category->save();
            }
        }
    }

    public function getDepth(array &$object_data)
    {
        $depth = 1;
        if (isset($object_data['params'])) {
            $this->changeKey($object_data, 'parent_id');
            $category = Category::find($object_data['parent_id']);
            $depth = $category->depth + 1;
            $this->incrementHeight($category);
        }
        $object_data['depth'] = $depth;
    }

    public function create(array $object_data)
    {
        try {
            DB::beginTransaction();
            $this->serializeTempFile($object_data);
            $icon = $this->popCondition($object_data, self::CATEGORY_ICON);
            $filterKey = $this->popCondition($object_data, self::FILTER);
            $this->getDepth($object_data);
            $object = parent::create($object_data);
            $this->checkImportanceForDelivery($object, $object_data);
            $this->productKeyService->createMany($filterKey, ['category_id' => $object->id]);
            $icon['id'] = $object->id;
            $this->service->create($icon);
            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }

    }

    private function checkImportanceForDelivery($object, $object_data)
    {
        $delivery = $this->popCondition($object_data, self::DELIVERY_IMPORTANT);
        $this->toggleCheckBoxObject($delivery, $object, DeliveryCategory::class, "id");
    }

    public function update($object, array $object_data)
    {
        try {
            DB::beginTransaction();
            $this->checkImportanceForDelivery($object, $object_data);
            $object = parent::update($object, $object_data);
            DB::commit();
            return $object;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function destroy($object): bool
    {
        try {
            DB::beginTransaction();
            $parent = $object->parent;
            $result = parent::destroy($object);
            $this->decrementHeight($parent);
            DB::commit();
            return $result;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw  $exception;
        }
    }
}

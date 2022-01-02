<?php


namespace App\Domain\Category\Services;


use App\Domain\Category\Entities\Category;
use App\Domain\Category\Interfaces\CategoryRelationInterface;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\File\Traits\FileUploadService;
use Illuminate\Support\Facades\DB;

class CategoryService extends BaseService implements CategoryRelationInterface
{
    use FileUploadService;

    public IconCatService $service;
    public FiltrationCategoryService $filtrationCategoryService;

    public function __construct()
    {
        parent::__construct();
        $this->service = new IconCatService();
        $this->filtrationCategoryService = new FiltrationCategoryService();
    }

    public function getEntity(): Category
    {
        return new Category();
    }

    public function getDepth(array &$object_data)
    {
        $depth = 0;
        if (isset($object_data['params'])) {
            $this->changeKey($object_data, 'parent_id');
            $depth = Category::find($object_data['parent_id'])->depth;
        }
        $object_data['depth'] = $depth + 1;
    }

    public function create(array $object_data)
    {
        try {
            DB::beginTransaction();
            $this->serializeTempFile($object_data);
            $icon = $this->popCondition($object_data, self::CATEGORY_ICON);
            $filter = $this->popCondition($object_data, "filtration");
            $this->getDepth($object_data);
            $object = parent::create($object_data);
            $this->filtrationCategoryService->createMany($filter, ['category_id' => $object->id]);
            $icon['id'] = $object->id;
            $this->service->create($icon);
            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }

    }

    public function update($object, array $object_data)
    {
        return parent::update($object, $object_data); // TODO: Change the autogenerated stub
    }
}

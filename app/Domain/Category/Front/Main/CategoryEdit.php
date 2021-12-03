<?php

namespace App\Domain\Category\Front\Main;

use App\Domain\Category\Builders\CategoryBuilder;
use App\Domain\Category\Entities\Category;
use App\Domain\Category\Front\Nested\CategoryNested;
use App\Domain\Core\File\Models\Livewire\FileLivewireNested;
use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;

class CategoryEdit extends Category implements CreateAttributesInterface
{
    // can call as i want , but when I create name must be type correctly
    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation(array(
            new FileLivewireNested("Category", $this->child_category),
            new InputFileAttribute("icon_file", "Иконка", self::class)
        ));
    }

    public function getIconFileAttribute(): FileAttribute
    {
        return new FileAttribute($this, "icon_media", 'category_id_1');
    }

    public function getChildCategoryAttribute(): CategoryNested
    {
        return CategoryNested::generate(
            "attachCategory",
            "Категории",
            "parent_id"
        );
    }


    public function attachCategory($id, int $status)
    {
        if ($status) {
            Category::when(gettype($id) == "array", function (CategoryBuilder $query) use ($id) {
                return $query->whereIn("id", $id);
            }, function (CategoryBuilder $query) use ($id) {
                return $query->where('id', '=', $id);
            })->update([
                'parent_id' => $this->id,
            ]);
        } else {
            Category::when(gettype($id) == "array", function (CategoryBuilder $query) use ($id) {
                return $query->whereIn("id", $id);
            }, function (CategoryBuilder $query) use ($id) {
                return $query->where('id', '=', $id);
            })->update([
                'parent_id' => null,
            ]);
        }
    }

}

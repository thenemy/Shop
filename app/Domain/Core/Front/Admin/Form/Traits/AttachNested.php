<?php

namespace App\Domain\Core\Front\Admin\Form\Traits;

use App\Domain\Category\Builders\CategoryBuilder;
use App\Domain\Category\Entities\Category;

trait AttachNested
{
    public function attachNested($id, $status, $entityClass, $parent_id, $primary_key = "id")
    {
        if ($status) { // accept
            $entityClass::when(gettype($id) == "array", function ($query) use ($id, $primary_key) {
                return $query->whereIn($primary_key, $id);
            }, function ($query) use ($id, $primary_key) {
                return $query->where($primary_key, '=', $id);
            })->update([
                $parent_id => $this->$primary_key,
            ]);
        } else { // decline
            $entityClass::when(gettype($id) == "array", function ($query) use ($id, $primary_key) {
                return $query->whereIn($primary_key, $id);
            }, function ($query) use ($id, $primary_key) {
                return $query->where($primary_key, '=', $id);
            })->update([
                $parent_id => null,
            ]);
        }
    }

    public function attachedManyNested($id, $key)
    {
        $this->$key()->toggle($id);
    }
}

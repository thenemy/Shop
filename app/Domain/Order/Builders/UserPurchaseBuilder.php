<?php

namespace App\Domain\Order\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;


class UserPurchaseBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "id";
    }

    public function filterBy($filter)
    {
        if (isset($filter['by_created_at'])) {
            $this->orderBy("created_at");
        }
        if (isset($filter['status'])) {
            $status = $filter['status'];
            $this->whereExists(function (Builder $query) use ($status) {
                $query->select(DB::raw(1))
                    ->from("taken_credits")
                    ->whereColumn("taken_credits.purchase_id", "=", "user_purchases.id")
                    ->where(DB::raw("taken_credits.status % 10"), "=", $status);
            })->orWhereExists(function ($query) use ($status) {
                $query->select(DB::raw(1))
                    ->from("payments")
                    ->whereColumn("payments.purchase_id", "=", "user_purchases.id")
                    ->where(DB::raw("payments.status % 10"), "=", $status);
            });
            unset($filter['status']);
        }
        return parent::filterBy($filter);
    }
}

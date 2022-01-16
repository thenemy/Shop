<?php

namespace App\Domain\Delivery\Api\Traits;

use App\Domain\Category\Entities\Category;
use App\Domain\Delivery\Api\Exceptions\DpdException;
use App\Domain\Shop\Entities\ShopAddress;
use App\Domain\Shop\Entities\WorkTimes;
use Illuminate\Support\Collection;

trait OrderTrait
{

    /**
     * go one class up probably
     * @param Collection $times
     * @return array  length of array is 2
     * first item is actual date
     * second item is  chosen WorkTime
     */
    private function calculateDatePickUp(Collection $times): array
    {
        $datePickUp = $times->firstWhere("day", ">=", weekday_num()); // there can be null because working period
        // on this week ends
        if (!$datePickUp) {
            $datePickUp = $times->first(); // so first working day is picked in the next week
            $day = self::NUM_DAYS_WEEK + $datePickUp->day - weekday_num(); // we only need
        } else {
            $day = weekday_num() - $datePickUp->day;
        }
        return [now()->addDays($day)->format("yy-mm-dd"), $datePickUp];
    }

    private function intToTime(int $value): string
    {
        return sprintf("%s:00", $value);
    }

    private function generateSenderAddress(WorkTimes $times, ShopAddress $address): array
    {
        $address_request = $address->delivery->toArray();
        $request = [
            'name' => $address->user->userCreditData->name,
            'workTimeFrom' => $this->intToTime($times->workTimeFrom),
            'workTimeTo' => $this->intToTime($times->workTimeTo)
        ];
        return array_merge($address_request, $request);
    }

    private function orderNumberInternal(int $pruchaseNumber, ShopAddress $fromAddress)
    {
        return $pruchaseNumber + $fromAddress->id;
    }

    private function purchaseToCategory(Collection $purchases)
    {
        $purchaseIds = $purchases->pluck('id');
        return Category::byPurchaseIn($purchaseIds);
    }

    private function calculateWeight(Collection $purchases)
    {
        return $purchases->reduce(function ($cary, $item) {
            return $cary + $item->quantity * $item->product->weight;
        });
    }

    private function categoriesIsRegistered(Collection $categories): bool
    {
        $cargoRegistered = false;
        foreach ($categories as $category) {
            $parent = $category->parent;

            if ($parent) {
                $parent = $category;
            }

            while ($parent->depth > 1) {
                $parent = $parent->parent;
            }

            if ($parent->deliveryImportant()->exists()) {
                $cargoRegistered = true;
                break;
            }
        }
        return $cargoRegistered;
    }



}

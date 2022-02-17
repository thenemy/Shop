<?php

namespace App\Domain\Installment\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class PlasticTakenCreditBuilder extends BuilderEntity
{
    public function joinTakenCredit(){
        return $this->join("plastic_card_taken_credit", "plastic_card.id" ,
            "=",
            "plastic_card_taken_credit.plastic_id");
    }
    public function joinTakenCreditWhere($taken_credit_id){
        return $this->joinTakenCredit()->where("plastic_card_taken_credit.taken_credit_id", '=', $taken_credit_id);
    }
    public function filterBy($filter)
    {
        if (isset($filter['taken_credit_id'])) {
            $this->joinTakenCreditWhere($filter['taken_credit_id']);
        }
        return parent::filterBy($filter);
    }
    protected function getSearch(): string
    {
        return "card_number";
    }
}

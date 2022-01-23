<?php
// namespace  will start with
namespace App\Http\Livewire\Admin\Pages\DecisionAttributeForPayment;  // 1  --- namespace

use App\Http\Livewire\Admin\Base\Abstracts\BaseEmptyLivewire;
//2 --- classname livewire
class DecisionAttribute extends BaseEmptyLivewire
{

    
 public $entity; public function acceptPayment(){\App\Domain\Payment\Front\Admin\Functions\AcceptPayment::acceptPayment($this);} public function denyPayment(){\App\Domain\Payment\Front\Admin\Functions\DenyPayment::denyPayment($this);}

 //3   --- set of functions and variables
    public function getPath():string
  {
    return 'livewire.admin.pages.decision-attribute-for-payment.decision-attribute'; //4  --- path to blade
  }

    public function getVariable():array
   {

    return [
              //5   --- variable to blade
        ];
    }

}

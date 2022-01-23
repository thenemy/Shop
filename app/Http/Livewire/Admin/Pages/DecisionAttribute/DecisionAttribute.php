<?php
// namespace  will start with
namespace App\Http\Livewire\Admin\Pages\DecisionAttribute;  // 1  --- namespace

use App\Http\Livewire\Admin\Base\Abstracts\BaseEmptyLivewire;
//2 --- classname livewire
class DecisionAttribute extends BaseEmptyLivewire
{

    
 public $entity;public $reason = []; public function acceptInstallment(){\App\Domain\Installment\Front\Admin\Functions\AcceptInstallment::acceptInstallment($this);} public function denyInstallment(){\App\Domain\Installment\Front\Admin\Functions\DenyInstallment::denyInstallment($this);} public function requireSurety(){\App\Domain\Installment\Front\Admin\Functions\RequiredSurety::requireSurety($this);}

 //3   --- set of functions and variables
    public function getPath():string
  {
    return 'livewire.admin.pages.decision-attribute.decision-attribute'; //4  --- path to blade
  }

    public function getVariable():array
   {

    return [
              //5   --- variable to blade
        ];
    }

}

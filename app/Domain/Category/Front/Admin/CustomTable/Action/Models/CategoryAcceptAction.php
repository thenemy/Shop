<?php


namespace App\Domain\Category\Front\Admin\CustomTable\Action\Models;


use App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts\AcceptActionAbstract;


class CategoryAcceptAction extends AcceptActionAbstract
{


    public function getRouteHandler()
    {
        return new CategoryRouteHandler();
    }

}

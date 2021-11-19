<?php

namespace App\Http\Controllers\Base\Abstracts;

use App\Domain\Core\File\Models\FileBladeCreator;
use App\Domain\Core\File\Models\FileLivewireCreator;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractTable;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Text\Traits\CaseConverter;
use App\Http\Controllers\Base\Interfaces\ControllerInterface;
use App\Http\Controllers\Controller;
use App\View\Helper\DropDown\Models\Base\DropDown;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

// there is will be one base controller which will have all necessary data
// so it has to accept only the name class of entity which will be have two required function 'getColumns' and 'getTableRows'
// Therefore, in index it will initiate CategoryTable(name class of entity :: all())
// it will check if the file is created if it is not it will create the blade, and write there basics component
// Form elements will be in one file. The loop in the form blade  will initiate name, value if exists, OpenButton all relations
// must made one more component to initiate key values
// There will be extension of this controller for nested Controller
// There will be created livewire components dynamically
//

/// first create livewire
///
/// second create all blades
abstract class BaseController extends Controller implements ControllerInterface
{
    use CaseConverter;

    private $service;

    private $form;
    private $path = "admin.";
    private $entity;


    public function getPath(): string
    {
        return $this->path . $this->toSnackCase($this->getClassName()) . ".";
    }

    private function getClassName(): string
    {
        $to_parts = explode("\\", $this->getEntityClass());
        return end($to_parts);
    }

    public function __construct()
    {
        $this->entity = $this->getNewEntity();
        $this->form = $this->getForm();
        $this->service = $this->getService();
        $createLivewire = new FileLivewireCreator($this->getClassName(), $this);
        $createBlades = new FileBladeCreator($this->getClassName());
    }


    private function getEntity($id)
    {
        return $this->getEntityClass()::find($id);
    }

    private function getNewEntity()
    {
        $base = $this->getEntityClass();
        return new $base();
    }



    //// MAIN FUNCTIONS
    ///
    ///
    ///

    public function getIndex(Request $request)
    {
        return view($this->getPath() . RoutesInterface::INDEX);
    }

    public function getCreate($params = [])
    {
        return view($this->getPath() . RoutesInterface::CREATE, [
            "form" => $this->form->create()
        ]);
    }

    protected function getStore(FormRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->service->create($request->validated());
            return back();
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function getUpdate(FormRequest $request, $id)
    {
        $entity = $this->getEntity($id);
    }

    public function getEdit(FormRequest $formRequest, $id, $params = [])
    {
        $entity = $this->getEntity($id);
        return view($this->getPath() . RoutesInterface::EDIT,
            [
                "form" => $this->form->update($params)
            ]
        );
    }

    public function getDestroy($id): \Illuminate\Http\RedirectResponse
    {
        $this->getEntity($id)->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers\Base\Abstracts;

use App\Domain\Core\File\Models\FileBladeCreatorIndex;
use App\Domain\Core\File\Models\FileLivewireCreator;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractTable;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Traits\FastInstantiation;
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
    use CaseConverter, FastInstantiation;

    private $service;

    private $form;
    private $path = "admin.pages.";
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
        $this->form = $this->getForm();
        $this->service = $this->getService();

    }

    public function getIndex($request, $variables = [])
    {
        return view($this->getPath() . RoutesInterface::INDEX, $variables);
    }

    public function getCreate($request, $params = [], $variables = [])
    {
        $params = [
            "form" => $this->form->create($params),
        ];

        return view($this->getPath() . RoutesInterface::CREATE, array_merge($variables, $params));
    }

    protected function getStore($object): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->service->create($object);
            return back()->with("success", __("Добавлено успешно"));
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function getStoreValidation(Request $request)
    {
        $request->validate($this->getEntityClass()::getCreateRules());
        return $this->getStore($request->all());
    }

    public function getUpdateValidation(Request $request, ...$values)
    {
        $request->validate($this->getEntityClass()::getUpdateRules());
        return $this->getUpdate($request->all(), ...$values);
    }

    public function getUpdate($object, $entity): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->service->update($entity, $object);
            return back()->with("success", __("Обновлено успешно"));
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function getEdit(Request $formRequest, $entity, $params = [], $variables = [])
    {
        return view($this->getPath() . RoutesInterface::EDIT,
            array_merge([
                "form" => $this->form->update($params),
                "entity" => $entity
            ], $variables)
        );
    }

    public function getShow(Request $formRequest, $entity, $params = [], $variables = [])
    {
        return view($this->getPath() . RoutesInterface::SHOW,
            array_merge([
                "form" => $this->form->show($params),
                "entity" => $entity
            ], $variables)
        );
    }

    public function getDestroy($entity): \Illuminate\Http\RedirectResponse
    {
        $this->service->destroy($entity);
        return back();
    }

    public function index(Request $request)
    {
        return $this->getIndex($request);
    }

    public function create(Request $request)
    {
        return $this->getCreate($request);
    }

    public function store(Request $request)
    {
        return $this->getStoreValidation($request);
    }
}

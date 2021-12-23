<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Core\Front\Admin\Form\Abstracts\AbstractForm;
use App\Domain\Core\Front\Admin\Form\Models\FormForModel;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\User\Entities\User;
use App\Domain\User\Front\Admin\Path\UserRouteHandler;
use App\Domain\User\Services\UserService;
use App\Http\Controllers\Base\Abstracts\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    //
    public function getEntityClass(): string
    {
        return User::class;
    }

    public function getService(): BaseService
    {
        return new UserService();
    }

    public function getForm(): AbstractForm
    {
        return FormForModel::new(UserRouteHandler::new(), __("Пользователя"));
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

    public function edit(Request $request, User $user)
    {
        return $this->getEdit($request, $user, [$user]);
    }

    public function update(Request $request, User $user)
    {
        return $this->getUpdateValidation($request, $user);
    }

    public function send_code(Request $request)
    {
        $request->validate([
            'phone' => 'required|max:12',
        ]);

        $verification_code = rand(000000, 999999);

//        $existedPhone = UserPhoneNums::where('phone_number', $request->phone)->first();
//        if ($existedPhone) {
//            $existedPhone->verification_code = $verification_code;
//            $existedPhone->save();
//        } else {
//            $userPhone = new UserPhoneNums([
//                'phone_number' => $request->phone,
//                'verification_code' => $verification_code,
//            ]);
//            $userPhone->save();
//        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9ub3RpZnkuZXNraXoudXpcL2FwaVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MzY1NzkyNTcsImV4cCI6MTYzOTE3MTI1NywibmJmIjoxNjM2NTc5MjU3LCJqdGkiOiJjSHZRdEZ0Q0kxVFNlMWhGIiwic3ViIjo0NDgsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.EbZIKm6s3M_Q28gvKNCu9ZOHc2nfztEVDgfJ0sNFORk',
        ])->post('notify.eskiz.uz/api/message/sms/send', [
            'mobile_phone' => $request->phone,
            'message' => $verification_code . 'is your code',
            'from' => '4546'
        ]);

        return $response;
    }
}

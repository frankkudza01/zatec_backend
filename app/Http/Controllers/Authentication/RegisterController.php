<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Interfaces\User\UserRegisterInterface;

class RegisterController extends Controller
{
    protected $userRegisterInterface;


    public function __construct(UserRegisterInterface $userRegisterInterface)
    {
        $this->userRegisterInterface = $userRegisterInterface;
    }

    public function store(UserRequest $request)
    {
        return $this->userRegisterInterface->requestUser($request);
    }

    public function update(UserRequest $request, $id)
    {
        return $this->userRegisterInterface->requestUser($request, $id);
    }
}

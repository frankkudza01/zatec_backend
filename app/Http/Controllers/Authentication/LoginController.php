<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\User\UserLoginInterface;


class LoginController extends Controller
{
    protected $userLoginInterface;


    public function __construct(UserLoginInterface $userLoginInterface)
    {
        $this->userLoginInterface = $userLoginInterface;
    }

    public function login(Request $request)
    {
        return $this->userLoginInterface->requestUser($request);
    }


}

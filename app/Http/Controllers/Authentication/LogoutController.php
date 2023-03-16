<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\User\UserLogoutInterface;

class LogoutController extends Controller
{
    protected $userLogoutInterface;

    public function __construct(UserLogoutInterface $userLogoutInterface)
    {
        $this->userLogoutInterface = $userLogoutInterface;
    }

    public function logout(Request $request)
    {
        return $this->userLogoutInterface->logoutUser($request);
    }
}

<?php

namespace App\Interfaces\User;

use App\Http\Requests\UserRequest;

interface UserRegisterInterface
{

    /**
     * Create | Update user
     *
     * @param   \App\Http\Requests\UserRequest    $request
     * @param   integer                           $id
     *
     * @method  POST    api/users       For Create
     * @method  PUT     api/  For Update
     * @access  public
     */
    public function requestUser(UserRequest $request, $id = null);

}

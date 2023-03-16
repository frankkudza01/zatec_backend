<?php

namespace App\Interfaces\User;

use Illuminate\Http\Request;

interface UserLoginInterface
{

    /**
     * Create | Update user
     *
     * @param   \App\Http\Requests\Request    $request
     * @param   integer                           $id
     *
     * @method  POST    api/      For Login
     * @access  public
     */
    public function requestUser(Request $request);

}

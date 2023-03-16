<?php

namespace App\Interfaces\User;

use Illuminate\Http\Request;

interface UserLogoutInterface
{

    /**
     * Create | Update user
     *
     * @param   \App\Http\Requests\Request    $request
     * @param   integer                           $id
     *
     * @method  Post    api/      For Logout
     * @access  public
     */
    public function logoutUser(Request $request);

}

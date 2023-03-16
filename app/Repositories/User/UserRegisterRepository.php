<?php

namespace App\Repositories\User;

use App\Http\Requests\UserRequest;
use App\Interfaces\User\UserRegisterInterface;
use App\Traits\ResponseJson;
use App\Models\User;
use DB;

class UserRegisterRepository implements UserRegisterInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseJson;

    public function requestUser(UserRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If user exists when we find it
            // Then update the user
            // Else create the new one.
            $user = $id ? User::find($id) : new User;

            // Check the user
            if($id && !$user) return $this->error("No user with ID $id", 404);

            $user->name = $request->name;
            // Remove a whitespace and make to lowercase
            $user->email = preg_replace('/\s+/', '', strtolower($request->email));

            // I dont wanna to update the password,
            // Password must be fill only when creating a new user.
            if(!$id) $user->password = \Hash::make($request->password);

            // Save the user
            $user->save();
            $success['token'] =  $user->createToken('access_token')->plainTextToken;

            DB::commit();
            return $this->success(
                [$id ? "User updated"
                    : "User created",
                $user, $id ? 200 : 201], $success);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

}

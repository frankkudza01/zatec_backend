<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use App\Interfaces\User\UserLogoutInterface;
use App\Traits\ResponseJson;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserLogoutRepository implements UserLogoutInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseJson;

    public function logoutUser(Request $request)
    {
        DB::beginTransaction();
        try {
            auth()->user()->tokens()->delete();
            DB::commit();
            return [
                'status' => true,
                'message' => 'user logged out'
            ];
        }

        catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}

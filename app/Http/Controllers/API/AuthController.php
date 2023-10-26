<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['name'] = $request->first_name . ' ' . $request->last_name;
        $user = User::create($input);
        $user['token'] =  $user->createToken('MyApp')->accessToken;
        return $this->apiResponse($user, 'User register successfully.');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->banned) {
                // User is banned, so don't allow login.
                return $this->sendError('Account is banned.', ['error' => 'Account is banned.']);
            }
            $user['token'] =  $user->createToken('MyApp')->accessToken;

            return $this->apiResponse($user, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}

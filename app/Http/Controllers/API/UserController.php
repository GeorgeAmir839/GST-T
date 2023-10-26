<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        if (!$users) {
            return $this->sendError(['message' => 'Resource not found'], 404);
        }

        return $this->apiResponse($users, 'Data get successfully.');
    }
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->sendError(['message' => 'Resource not found'], 404);
        }
        return $this->apiResponse($user, 'Data get successfully.');
    }

    public function update(UpdateUserRequest $request, string $id)
    {


        if ($request->password != null) {

            $request['password']  = bcrypt($request->password);
        }
        $user = User::find($id);
        $user->update($request->all());
        return $this->apiResponse($user,  'The user Updated successfully');
    }


}

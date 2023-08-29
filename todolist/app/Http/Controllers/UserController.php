<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CreateUserService;
use App\Services\UserAuthorizationService;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function createUser(Request $request){
        $createUserService = new CreateUserService();
        $userData = $request->all();
        $user = $createUserService->execute($userData);
        $user->save();
        return $user;

    }

    public function listUsers(){
        return User::with('tasks')->get();
    }

    public function retrieveUser($id){
        $user = User::with('tasks')->findOrFail($id);
        return $user;
    }

    public function updateUser(Request $request, $id){
        $userAuthorizationService = app(UserAuthorizationService::class);
        $user = User::findOrFail($id);
        $userAuthorizationService->checkAuthorization($user);
        $user->update($request->all());
        return $user;
    }

    public function deleteUser($id){
        $userAuthorizationService = app(UserAuthorizationService::class);
        $user = User::findOrFail($id);
        $userAuthorizationService->checkAuthorization($user);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully!']);
    }
}
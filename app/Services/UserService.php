<?php

namespace App\Services;

use App\Repositories\UserRepository;
use gersonalves\laravelBase\Service\BaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new UserRepository());
    }

    public function login(Request $request): JsonResponse|array
    {
        $user = $this->repository->findBy('email', $request->email);
        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        if (! password_verify($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid password'], 401);
        }
        $token = $user->createToken('authToken')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}

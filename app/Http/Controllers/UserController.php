<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\PeopleService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public UserService $service;

    protected array $validators = [];

    protected array $replaceOnUpdate = [];

    protected array $excludeOnUpdate = [];

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function login(Request $request): JsonResponse
    {
        return response()->json($this->service->login($request), 200);
    }

    /**
     * @throws Exception
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate($this->validators);
        $request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
        $peopleService = new PeopleService();
        $people = new Request($request['people']);

        $user = $this->service->store($request);
        $people = $peopleService->store(
            $people->merge([
                'id_user' => $user['id_user'],
                'stack' => json_encode($people['stack']),
            ])
        );
        $request['id_people'] = $people['id_people'];

        return response()->json();
    }
}

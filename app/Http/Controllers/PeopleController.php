<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\PeopleService;

class PeopleController extends Controller
{
    public PeopleService $service;

    protected array $validators = [];

    protected array $replaceOnUpdate = [];

    protected array $excludeOnUpdate = [];

    public function __construct(PeopleService $service)
    {
        $this->service = $service;
    }
}

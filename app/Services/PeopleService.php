<?php

namespace App\Services;

use App\Repositories\PeopleRepository;
use gersonalves\laravelBase\Service\BaseService;

class PeopleService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new PeopleRepository());
    }
}

<?php

namespace App\Repositories;

use App\Models\People;
use gersonalves\laravelBase\Repository\BaseRepository;

class PeopleRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new People());
    }
}

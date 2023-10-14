<?php

namespace App\Repositories;

use App\Models\User;
use gersonalves\laravelBase\Repository\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new User());
    }

    public function findByEmail(string $email): ?User
    {
        return $this->findBy('email', $email);
    }

    public function findByToken(string $token): ?User
    {
        return $this->findBy('token', $token);
    }
}

<?php

namespace App\Repositories\Auth;

use App\Repositories\BaseRepository;

interface AuthRepository extends BaseRepository
{
    public function isAuthAuthenticated(array $data, $remember_token);

    public function logoutUser();
}

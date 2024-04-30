<?php

namespace App\Repositories\Auth;

use App\Repositories\BaseEloquentRepository;

class AuthEloquentRepository extends BaseEloquentRepository implements AuthRepository
{
    public function isAuthAuthenticated(array $data, $remember_token)
    {
        return auth()->attempt($data, $remember_token);
    }

    public function logoutUser()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerate();
    }
}

<?php

namespace App\Livewire\Auth;

use App\Repositories\Auth\AuthRepository;
use Livewire\Component;

class Logout extends Component
{

    public function logOut(AuthRepository $authRepository)
    {

        $authRepository->logoutUser();

        return redirect(route('login'));
    }


    public function render()
    {
        return view('livewire.auth.logout');
    }
}

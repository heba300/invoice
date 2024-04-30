<?php

namespace App\Livewire\Auth;

use App\Repositories\Auth\AuthRepository;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layout.auth.index')]
#[Title('login')]
class Login extends Component
{
    public $email;
    public $password;
    public $remember_token;

    public function login(AuthRepository $authRepository)
    {
        $this->remember_token == 'remember' ? true : false;
        $user = $authRepository->isAuthAuthenticated($this->except(['_token', 'remember_token']), $this->remember_token);

        if (!$user) {
            return redirect(route('login'))->with('danger', 'invalid Credentials');
        };

        session()->regenerate();

        return redirect(route('dashboard'))->with('success', 'welcome To DashBoard');
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

<?php

namespace App\Livewire\Users;

use App\Repositories\Auth\AuthRepository;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('users-list')]
class UsersList extends Component
{
    public $userId;

    #[Computed()]
    public function allUsers(AuthRepository $authRepository)
    {
        return  $authRepository->getAll();
    }

    public function targetUserId($id)
    {
        $this->userId = $id;
    }

    public function delete(AuthRepository $authRepository)
    {
        $user = $authRepository->find($this->userId);

        if (!$user) {
            return redirect(route('users-list'))->with('warning', 'there is no such as accountant');
        }

        $authRepository->destroy($user);
        return redirect(route('users-list'))->with('danger', 'accountant has been deleted!');
    }

    public function render()
    {
        return view('livewire.users.users-list');
    }
}

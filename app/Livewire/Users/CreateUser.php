<?php

namespace App\Livewire\Users;

use App\Repositories\Auth\AuthRepository;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $image;
    public $role;

    #[Computed()]
    public function allRoles()
    {
        return Role::all();
    }

    public function register(AuthRepository $authRepository)
    {
        $formData = $this->validate();

        if ($this->image) {
            $formData['image'] = $this->image->store('usersLogo', 'public');
        }

        $authRepository->create($formData)->assignRole($this->role);
        return redirect(route('users-list'))->with('success', 'user has been created ');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'unique:users,email'],
            'password' => 'required',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'role' => 'required',
            'image' => 'nullable|image|sometimes|max:1024'
        ];
    }


    public function render()
    {
        return view('livewire.users.create-user');
    }
}

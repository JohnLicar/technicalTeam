<?php

namespace App\Livewire\Users\Modal;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class Create extends ModalComponent
{
    use AuthorizesRequests;

    public $name;
    public $email;
    public $role;

    #[Computed()]
    public function roles()
    {
        return Role::all()->pluck('name');
    }

    public function render()
    {
        $this->authorize('create user');

        return view('livewire.users.modal.create');
    }

    public function addUser()
    {

        $this->authorize('create user');
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role' => ['required', 'string', 'max:255',  Rule::in($this->roles)],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('password')
        ]);

        $user->assignRole($this->role);

        $this->dispatch('refresh_user');
        $this->dispatch('showToast', ['type' => "success", 'message' => "Users Information Added successfully!", 'title' => "Success"]);
        $this->closeModal();
    }
}

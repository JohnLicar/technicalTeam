<?php

namespace App\Livewire\Users\Modal;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class Update extends ModalComponent
{
    use AuthorizesRequests;

    public ?User $user;

    public $name;
    public $email;
    public $role;

    #[Computed()]
    public function roles()
    {
        return Role::all()->pluck('name');
    }

    public function mount()
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = Arr::first($this->user->roles()->pluck('name'));
    }

    public function render()
    {
        $this->authorize('edit user');

        return view('livewire.users.modal.update');
    }

    public function updateUser()
    {

        $this->authorize('create user');
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',  'unique:users,email,' . $this->user->id],
            'role' => ['required', 'string', 'max:255',  Rule::in($this->roles)],
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->user->syncRoles($this->role);

        $this->dispatch('refresh_user');
        $this->dispatch('showToast', ['type' => "success", 'message' => "Users Information updated successfully!", 'title' => "Success"]);
        $this->closeModal();
    }
}

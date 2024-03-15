<?php

namespace App\Livewire\Users\Modal;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class View extends ModalComponent
{

    use AuthorizesRequests;

    public ?User $user;

    public $is_approve;

    public string $role = '';

    #[Computed()]
    public function roles()
    {
        return Role::all()->pluck('name');
    }


    public function mount()
    {
        $this->authorize('view user');

        $this->is_approve = $this->user->is_approve;
        $this->role = Arr::first($this->user->roles()->pluck('name'));
    }

    public function render()
    {
        return view('livewire.users.modal.view');
    }

    public function approve()
    {

        $this->validate([
            'is_approve' => ['required', Rule::in(\App\Enums\ApprovalStatus::cases())],
            'role' => ['required', 'string',  Rule::in($this->roles)]
        ]);

        $this->user->update([
            'is_approve' => $this->is_approve
        ]);

        $this->user->syncRoles($this->role);
        $this->reset('is_approve', 'role');
        $this->dispatch('user_created');
        $this->dispatch('showToast', ['type' => "success", 'message' => "Applicant Information Added successfully!", 'title' => "Success"]);
        $this->closeModal();
    }
}

<?php

namespace App\Livewire\Users\Modal;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Computed;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class RolesAndPermission extends ModalComponent
{
    use AuthorizesRequests;

    public $selectedPermissions;
    public $user;


    #[Computed()]
    public function permissions()
    {
        return Permission::all()->pluck('name');
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->selectedPermissions = $user->getAllPermissions()->pluck('name');
    }

    public function render()
    {
        $this->authorize('edit user');

        return view('livewire.users.modal.roles-and-permission');
    }

    public function syncUserPermission()
    {
        $this->user->syncPermissions($this->selectedPermissions);
        $this->dispatch('showToast', ['type' => "success", 'message' => "Users Direct Permissions updated Successfully", 'title' => "Success"]);
    }


    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}

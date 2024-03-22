<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination, AuthorizesRequests;


    #[Url]
    public string $search = "";

    #[Computed()]
    #[On('refresh_user')]
    public function users()
    {
        return User::query()
            ->with('roles')
            ->whereLike(['name'], $this->search)
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        $this->authorize('view user');

        return view('livewire.users.index');
    }
}

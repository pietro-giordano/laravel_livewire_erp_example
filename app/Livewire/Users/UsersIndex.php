<?php

namespace App\Livewire\Users;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function delete(int $id)
    {
        try {
            User::destroy($id);

            return session()->flash('success', 'Dipendente eliminato con successo');
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }

    public function mount()
    {
        Gate::authorize('viewAny', User::class);
    }

    public function render()
    {
        return view('livewire.users.users-index', [
            'users' => User::with('role')->orderBy('role_id')->paginate(10),
        ])->layout('layouts.app');
    }
}

<?php

namespace App\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UsersCreate extends Component
{
    #[Validate('required|string|max:255')]
    public $name;
    #[Validate('required|email|string|max:255|unique:users')]
    public $email;
    #[Validate('required|string|confirmed|min:8|max:255')]
    public $password;
    public $password_confirmation;
    #[Validate('required')]
    public $role;

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => $this->role,
        ]);

        session()->flash('success', 'Operazione avvenuta con successo');
        return $this->redirect('/users', navigate: true);
    }

    public function mount()
    {
        Gate::authorize('create', User::class);
    }

    public function render()
    {
        return view('livewire.users.users-create', [
            'roles' => Role::all(),
        ])->layout('layouts.app');
    }
}

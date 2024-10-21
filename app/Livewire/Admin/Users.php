<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {

        $users = User::all();


        return view('livewire.admin.users', [
            'users' => $users
        ]);
    }
}

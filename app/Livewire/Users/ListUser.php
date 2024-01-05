<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ListUser extends Component
{
    use WithPagination;
    public string $searchUser = '';

    public function deleteUser(User $user): void
    {
        $this->authorize('manage', $user);

        $name = $user->name;

        $user->delete();

        session()->flash('status', 'User ' . $name . ' Deleted!');
    }

    public function render(): View
    {
        $filteredUsers = User::where('name', 'like', '%' . $this->searchUser . '%')
            ->orWhere('email', 'like', '%' . $this->searchUser . '%')
            //search by role
            ->orWhereHas('roles', function ($query) {
                $query->where('name', 'like', '%' . $this->searchUser . '%');
            })
            ->when(auth()->user()->hasRole('Agent'), function ($query) {
                $query->assignedToAgent(auth()->user());
            })
            ->when(! auth()->user()->hasAnyRole('Admin', 'Agent'), function ($query) {
                $query->byUser(auth()->user());
            });

        return view('livewire.users.list-user', [
            'users' => $filteredUsers->latest()->paginate(8),
        ]);
    }
}

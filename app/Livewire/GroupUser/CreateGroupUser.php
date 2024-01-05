<?php

namespace App\Livewire\GroupUser;

use App\Models\Group;
use App\Models\GroupUser;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use PhpParser\Node\Stmt\GroupUse;

class CreateGroupUser extends Component
{

    public Group $group;
    public $userId;



    public function mount(Group $group): void
    {
        $this->group = $group;
    }

    public function addUserToGroup(): Redirector|RedirectResponse
    {
        //$this->validate();
        $groupUser = GroupUser::create([
            'user_id' => $this->userId,
            'group_id' => $this->group->id,
        ]);
        session()->flash('status', 'تم اضافة المستخدم الى المجموعة بنجاح');
        return redirect()->route('groups.user', $this->group);
    }


    public function render(): View
    {
        //get all users that their role is agent
        $users = User::with(['groups','roles'])->get();
        $users = $users->filter(function ($user) {
            return $user->hasRole('Agent');
        });
        //check if user already in group
        $users = $users->filter(function ($user) {
            return !$user->groups->contains($this->group);
        });
        return view('livewire.groups.create-group-user', [
            'users' => $users,
        ]);
    }
}

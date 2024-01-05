<?php

namespace App\Livewire\GroupUser;

use App\Models\Category;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ListGroupUser extends Component
{
    use WithPagination;
    public Group $group;

    public function mount(Group $group): void
    {
        $this->group = $group;
    }

    public function deleteGroupUser(Group $group,User $user): void
    {
        $this->authorize('manage', $group);

        GroupUser::where('group_id',$group->id)->where('user_id',$user->id)->delete();

        session()->flash('status', 'تم حذف المستخدم من المجموعة بنجاح');
    }

    public function render(): View
    {
        //get all users that are not in the group
        //$users = $this->group->users()->pluck('id');
        $groupUsers = $this->group->users()->paginate(10);
        return view('livewire.groups.list-group-user', [
            'groupUsers' => $groupUsers,
            'group' => $this->group,
        ]);
    }
}

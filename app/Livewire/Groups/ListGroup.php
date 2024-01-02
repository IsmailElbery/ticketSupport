<?php

namespace App\Livewire\Groups;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ListGroup extends Component
{
    use WithPagination;

    public function deleteCategory(Group $group): void
    {
        $this->authorize('manage', $group);

        $name = $group->name;

        $group->delete();

        session()->flash('status', 'Group ' . $name . ' Deleted!');
    }

    public function render(): View
    {
        return view('livewire.groups.list-group', [
            'groups' => Group::orderBy('name')->paginate(10),
        ]);
    }
}

<?php

namespace App\Livewire\GroupUser;

use App\Models\Group;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class EditGroupUser extends Component
{
    public Group $group;
    public string $name = '';

    public function mount(Group $group): void
    {
        $this->group = $group;
        $this->name = $group->name;
    }

    /**
     * @return array<string, array<string>>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                // Unique with exception doesn't work as Rule Attribute
                'unique:groups,name,' . $this->group->id,
                'min:3',
                'max:255',
            ],
        ];
    }

    public function save(): Redirector|RedirectResponse
    {
        $this->authorize('manage', $this->group);

        // Still needed even though the docs say it runs automatically
        $this->validate();

        $this->group->update([
            'name' => $this->name,
        ]);

        return redirect()->route('groups.index')
            ->with('status', 'Group ' . $this->name . ' updated.');
    }

    public function render(): View
    {
        return view('livewire.groups.edit-group');
    }
}

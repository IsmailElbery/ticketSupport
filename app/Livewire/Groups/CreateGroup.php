<?php

namespace App\Livewire\Groups;

use App\Models\Group;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class CreateGroup extends Component
{
    #[Validate(['required', 'unique:groups,name', 'min:3', 'max:255'])]
    public string $name = '';

    public function save(): Redirector|RedirectResponse
    {
        $this->authorize('manage', Group::class);

        // Still needed even though the docs say it runs automatically
        $this->validate();

        Group::create(
            $this->only(['name'])
        );

        return redirect()->route('groups.index')
            ->with('status', 'Group ' . $this->name . ' created.');
    }

    public function render(): View
    {
        return view('livewire.groups.create-group');
    }
}

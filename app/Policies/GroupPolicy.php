<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;

class GroupPolicy
{
    public function manage(User $user, Group $group = null): bool
    {
        return $user->hasPermissionTo('manage groups');
    }
}

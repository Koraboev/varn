<?php

namespace App\Policies;


use App\Models\Additional;
use App\Models\User;

class AdditionalPolicy
{
    /**
     * Create a new policy instance.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Additional $additional): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Additional $additional): bool
    {
        return false;
    }
}

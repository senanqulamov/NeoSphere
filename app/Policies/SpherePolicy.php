<?php

namespace App\Policies;

use App\Models\Sphere;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SpherePolicy
{

    public function update(User $user, Sphere $sphere)
    {
        return $user->id === $sphere->user_id;
    }

    public function delete(User $user, Sphere $sphere)
    {
        return $user->id === $sphere->user_id;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Sphere $sphere): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Sphere $sphere): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Sphere $sphere): bool
    {
        return false;
    }
}

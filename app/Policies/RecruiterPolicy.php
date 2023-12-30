<?php

namespace App\Policies;

use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RecruiterPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('Read List Recruiters');     

      }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Recruiter $recruiter): bool
    {
        return $user->hasPermissionTo('Read Recruiter');     
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('Create Recruiter');     

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Recruiter $recruiter): bool
    {
        return $user->hasPermissionTo('Edit Recruiter');     

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Recruiter $recruiter): bool
    {
        return $user->hasPermissionTo('Destroy Recruiter');     

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Recruiter $recruiter): bool
    {
        return $user->hasPermissionTo('Destroy List Recruiters');     

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Recruiter $recruiter): bool
    {
        return $user->hasPermissionTo('Destroy List Recruiters');     

    }
}

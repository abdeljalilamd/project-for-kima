<?php

namespace App\Policies;

use App\Models\JobSeeker;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobSeekerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('Read List JobSeekers');   
     }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobSeeker $jobSeeker): bool
    {
        return $user->hasPermissionTo('Read JobSeeker');   
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('Create JobSeeker');   
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobSeeker $jobSeeker): bool
    {
        return $user->hasPermissionTo('Edit JobSeeker');   
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobSeeker $jobSeeker): bool
    {
        return $user->hasPermissionTo('Destroy JobSeeker');   
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobSeeker $jobSeeker): bool
    {
        return $user->hasPermissionTo('Destroy List JobSeekers');   
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobSeeker $jobSeeker): bool
    {
        return $user->hasPermissionTo('Destroy List JobSeekers');   
    }
}

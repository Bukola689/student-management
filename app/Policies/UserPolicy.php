<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->user_type == 'super_admin' ||  $user->user_type == 'admin'
                 ? Response::allow()
                 : Response::deny('You do not have the permission to view this page !.');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        return $user->id === $model->id || $user->user_type == 'super_admin' ||  $user->user_type == 'admin' || $user->user_type == 'teacher' ||  $user->user_type == 'libarian' || $user->user_type == 'parent' ||  $user->user_type == 'accountant' ||  $user->user_type == 'libarian' || $user->user_type == 'student'
               ? Response::allow()
               : Response::deny('You do not own this user.');
    }
    public function super_Admin(User $user)
    {
        return $user->user_type == 'super_admin'
               ? Response::allow()
               : Response::deny('You do not have permission to update this user type.');
    }

    public function edit(User $user, User $model)
    {
        return $user->id === $model->id || $user->user_type == 'super_admin' ||  $user->user_type == 'admin'|| $user->user_type == 'teacher' || $user->user_type == 'parent' || $user->user_type == 'libarian' || $user->user_type == 'accountant' || $user->user_type == 'libarian' || $user->user_type == 'student'
               ? Response::allow()
               : Response::deny('You do not own this user.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        return $user->id === $model->id || $user->user_type == 'super_admin' ||  $user->user_type == 'admin' || $user->user_type == 'teacher' || $user->user_type == 'parent' ||  $user->user_type == 'accountant' || $user->user_type == 'libarian' || $user->user_type == 'student'
               ? Response::allow()
               : Response::deny('You do not own this user.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}

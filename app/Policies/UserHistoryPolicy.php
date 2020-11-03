<?php

namespace App\Policies;

use App\Models\UserHistory;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any user histories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the user history.
     *
     * @param  \App\User  $user
     * @param  \App\Models\UserHistory  $userHistory
     * @return mixed
     */
    public function view(User $user, UserHistory $userHistory)
    {
        //
    }

    /**
     * Determine whether the user can create user histories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the user history.
     *
     * @param  \App\User  $user
     * @param  \App\Models\UserHistory  $userHistory
     * @return mixed
     */
    public function update(User $user, UserHistory $userHistory)
    {
        //
    }

    /**
     * Determine whether the user can delete the user history.
     *
     * @param  \App\User  $user
     * @param  \App\Models\UserHistory  $userHistory
     * @return mixed
     */
    public function delete(User $user, UserHistory $userHistory)
    {
        //
    }

    /**
     * Determine whether the user can restore the user history.
     *
     * @param  \App\User  $user
     * @param  \App\Models\UserHistory  $userHistory
     * @return mixed
     */
    public function restore(User $user, UserHistory $userHistory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the user history.
     *
     * @param  \App\User  $user
     * @param  \App\Models\UserHistory  $userHistory
     * @return mixed
     */
    public function forceDelete(User $user, UserHistory $userHistory)
    {
        //
    }
}

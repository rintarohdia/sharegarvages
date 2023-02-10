<?php

namespace App\Policies;

use App\Models\User;
use App\Models\corp;
use Illuminate\Auth\Access\HandlesAuthorization;

class CorpPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\corp  $corp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, corp $corp)
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
     * @param  \App\Models\corp  $corp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, corp $corp)
    {
        //
        if($user->cop_id==$corp->id){
            return true;
        }  else {
            return false;
        }
        //

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\corp  $corp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, corp $corp)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\corp  $corp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, corp $corp)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\corp  $corp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, corp $corp)
    {
        //
    }
}

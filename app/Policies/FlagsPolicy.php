<?php

namespace App\Policies;

use App\User;
use App\Flag;
use Illuminate\Auth\Access\HandlesAuthorization;

class FlagsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the flag.
     *
     * @param  \App\User  $user
     * @param  \App\Flag  $flag
     * @return mixed
     */
    public function view(User $user, Flag $flag)
    {
        // Update $user authorization to view $flag here.
        return true;
    }
    /**
     * Determine whether the user can create flag.
     *
     * @param  \App\User  $user
     * @param  \App\Flag  $flag
     * @return mixed
     */
    public function create(User $user, Flag $flag)
    {
        // Update $user authorization to create $flag here.
        return true;
    }
    /**
     * Determine whether the user can update the flag.
     *
     * @param  \App\User  $user
     * @param  \App\Flag  $flag
     * @return mixed
     */
    public function update(User $user, Flag $flag)
    {
        // Update $user authorization to update $flag here.
        if ($user->admin == 1)
        {
            return true;
        }
    }
    /**
     * Determine whether the user can delete the flag.
     *
     * @param  \App\User  $user
     * @param  \App\Flag  $flag
     * @return mixed
     */
    public function delete(User $user, Flag $flag)
    {
        // Update $user authorization to delete $flag here.
        if ($user->admin == 1)
        {
            return true;
        }

    }
}

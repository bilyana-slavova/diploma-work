<?php

namespace App\Policies;

use App\User;
use App\Measurement;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeasurementPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the measurement.
     *
     * @param  \App\User  $user
     * @param  \App\Measurement  $measurement
     * @return mixed
     */
    public function view(User $user, Measurement $measurement)
    {
        return true;
    }

    /**
     * Determine whether the user can create measurements.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the measurement.
     *
     * @param  \App\User  $user
     * @param  \App\Measurement  $measurement
     * @return mixed
     */
    public function update(User $user, Measurement $measurement)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the measurement.
     *
     * @param  \App\User  $user
     * @param  \App\Measurement  $measurement
     * @return mixed
     */
    public function delete(User $user, Measurement $measurement)
    {
        return false;
    }
}

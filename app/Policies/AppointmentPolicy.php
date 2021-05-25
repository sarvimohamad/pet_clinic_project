<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class AppointmentPolicy
{
    use HandlesAuthorization;


    public function delete(User $user , Appointment $appointment)
    {
        return $user->is_admin === 1;
    }
}

<?php

namespace App\Policies;

use App\Models\Pet;
use App\Models\User;
use App\Models\Vet;
use Illuminate\Auth\Access\HandlesAuthorization;

class VetPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function show(User $user)
    {
        return $user->is_vet === 1;
    }

    public function checkIsAdmin(User $user)
    {
        return $user->is_admin ===1;
    }
}

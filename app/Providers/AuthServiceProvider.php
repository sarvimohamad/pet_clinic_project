<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\User;
use App\Models\Vet;
use App\Policies\AppointmentPolicy;
use App\Policies\VetPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Appointment::class => AppointmentPolicy::class,
        User::class => VetPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('create_pet' ,function (User $user ){
//           return $user->is_admin;
//        });
    }
}

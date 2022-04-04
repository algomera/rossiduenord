<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\PracticePolicy;
use App\Practice;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //Practice::class => PracticePolicy::class,
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-applicant', 'App\Policies\ApplicantPolicy@update');   
        Gate::define('edit-practice', 'App\Policies\PracticePolicy@update'); 
        Gate::define('edit-subject', 'App\Policies\SubjectPolicy@update');
        Gate::define('edit-building', 'App\Policies\BuildingPolicy@update');
        Gate::define('edit-superbonus', 'App\Policies\SuperbonusPolicy@view');
    }
}

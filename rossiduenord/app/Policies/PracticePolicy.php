<?php

namespace App\Policies;

use App\Applicant;
use App\Practice;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\DB;

class PracticePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Practice  $practice
     * @return mixed
     */
    public function view(User $user, Practice $practice)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Practice  $practice
     * @return mixed
     */
    public function update(User $user, Practice $practice, Applicant $applicant)
    {
        $applicants = Applicant::where('user_id', auth()->id())->pluck('id');

        $q = DB::table('practices')
        ->whereIn('applicant_id', $applicants);
        $s = $q->pluck('applicant_id');
        //dd($s);

        if(isset($practice->applicant_id, $s)){
           return Response::allow();
        }
         
        return Response::deny('Accesso negato!');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Practice  $practice
     * @return mixed
     */
    public function delete(User $user, Practice $practice)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Practice  $practice
     * @return mixed
     */
    public function restore(User $user, Practice $practice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Practice  $practice
     * @return mixed
     */
    public function forceDelete(User $user, Practice $practice)
    {
        //
    }
}
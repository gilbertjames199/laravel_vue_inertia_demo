<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    
    public function create(User $user)
    {
        //
        return $user->email ==='admin1@mail.com';
    }

    public function edit(User $user, User $model)
    {
        //
        return true;
    }
    
}

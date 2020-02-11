<?php

namespace App\Policies;

use App\Document;
use App\Roles;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param User     $user
     * @param Document $document
     *
     * @return bool
     */
    public function edit(User $user, Document $document)
    {
        return $user->id === $document->user_id;
    }

    /**
     * @param User  $user
     * @param Roles $roles
     *
     * @return bool
     */
    public function create(User $user, Roles $roles)
    {
        return $user->hasRole(1);
    }
}

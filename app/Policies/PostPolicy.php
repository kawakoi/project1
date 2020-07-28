<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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

    public function pass(User $user, Post $post)
    {
        return $user->id == $post->user_id;
        
        //if($user->id == $post->user_id)
        //{
        //    return true;
        //}
        //else{
        //    return false;
        //}
    }

    public function roles(User $rol)
    {
        return $rol->rol;
    }

    // public function comprobarRoles(User $user)
    // {
    //     return $user->roles;
      
    // }


}

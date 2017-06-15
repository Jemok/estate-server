<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/21/17
 * Time: 11:46 AM
 */

namespace App\Api\V1\Modules\Authorization\Repositories;

use App\User;
use App\Api\V1\Modules\Authorization\Models\Role;

class RoleRepository
{
    /**
     * Retrieve a single Role model from the database
     * @param array $roles
     * @return array
     */
    public function getRoleIds(array $roles){

        $model = new Role();

        $role_ids = [];

        foreach($roles as $role){

            $role_ids[] = $model->where('name', $role)->firstOrFail()->id;
        }

        return $role_ids;
    }

    /**
     * @param User $user
     * @param $roles
     */
    public function setRoles(User $user, $roles){

       $user->attachRoles($roles);
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function getUserRoles(User $user){

       return $user->roles()->get()->last()->name;
    }

    public function getUserRolesDescription(User $user){

        return $user->roles()->get()->last()->description;
    }

    public function removeRole(User $user, array $roles){

        $user->detachRoles($roles);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function checkIfUserHasRole(User $user){

        $user_role = $this->getUserRoles($user);

        if($user_role == 'treasurer' || $user_role == 'secretary' || $user_role == 'chairman'){

            return true;
        }

    }
}
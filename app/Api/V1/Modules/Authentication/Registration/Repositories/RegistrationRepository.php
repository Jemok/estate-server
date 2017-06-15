<?php
/**
 * RegistrationRepository Class
 * This class handles the business logic for the
 * Registration Module
 */

namespace App\Api\V1\Modules\Authentication\Registration\Repositories;


use App\User;

class RegistrationRepository
{
    /**
     *  Store User Model
     * @param array $memberData
     * @return array
     */
    public function store(array $memberData){
        // New User Model initialization
        $model = new User();

        // Assign model attributes values
        $model->first_name            = $memberData['first_name'];
        $model->second_name           = $memberData['second_name'];
        $model->email                = $memberData['email'];
        $model->registration_number   = $memberData['registration_number'];
        $model->password             = bcrypt($memberData['password']);

        // Store the User Model
        $model->save();

        // Return the User Model
        return $model;
    }
}
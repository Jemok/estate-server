<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/15/17
 * Time: 8:50 PM
 */

namespace App\Api\V1\Modules\Authentication\Registration\Http\Controllers;


use App\Api\V1\Modules\Authentication\Login\Traits\LoginTrait;
use App\Api\V1\Modules\Authentication\Login\Transformers\LoginTransformer;
use App\Api\V1\Modules\Authentication\Registration\Http\Validators\MemberRegistrationValidator;
use App\Api\V1\Modules\Authentication\Registration\Repositories\RegistrationRepository;
use App\Api\V1\Modules\Authorization\Repositories\RoleRepository;
use App\Api\V1\Modules\Invitation\Repositories\InvitationRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;

class RegistrationController extends Controller
{
    use Helpers;
    use LoginTrait;

    public function registerStudent(Request $request,
                                   MemberRegistrationValidator $memberRegistrationValidator,
                                   RegistrationRepository $registrationRepository,
                                   InvitationRepository $invitationRepository,
                                   RoleRepository $roleRepository){
        // We handle validation of the incoming member data, and we assign the validation
        // response to the $validation_response variable
        $validation_response = $memberRegistrationValidator->validate($request->all());

        // If the validation did not pass
        // We return the validation response
        // which contains an array of the error messages
        if($validation_response != false){
            return $validation_response;
        }

        $invitation = $invitationRepository->showFromInvitationLink($request->invitationLink);


        if($invitation != false){
            $invitation += ['password' => $request->password];

            // We store user data in the database, and assign the returned User Model to a
            // $user variable
            $user = $registrationRepository->store($invitation);

            $roleRepository->setRoles($user, $roleRepository->getRoleIds(['student']));

            // We authenticate the user
            return $this->authenticate(['registration_number'=> $user->registration_number, 'password' => $request->password], new LoginTransformer(), $roleRepository);
        }

        return $this->response->array(['message' => 'Your link is expired'])->setStatusCode(404);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/4/17
 * Time: 12:23 AM
 */

namespace App\Api\V1\Modules\Account\Repositories;


use App\Api\V1\Modules\Account\Models\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileRepository
{
    /**
     * @param User $user
     * @param Request $request
     */
    public function store(User $user, Request $request){

        $user->prof_pic = $request->downloadUrl;

        $user->save();
    }

    /**
     * @param User $user
     * @param Request $request
     */
    public function update(User $user, Request $request){

        $user->prof_pic = $request->downloadUrl;

        $user->save();
    }


}
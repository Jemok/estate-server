<?php

namespace App\Api\V1\Modules\Account\Http\Controllers;

use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Api\V1\Modules\Account\Repositories\ProfileRepository;

class ProfileController extends Controller
{
    use Helpers;
    /**
     * @param Request $request
     * @param ProfileRepository $profileRepository
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request, ProfileRepository $profileRepository){

        if(Auth::user()->prof_pic != null){

            return $this->update($request, $profileRepository);
        }

        $profileRepository->store(Auth::user(), $request);

        return $this->response->array(['avatarUrl' => Auth::user()->prof_pic])->setStatusCode(201);
    }

    /**
     * @param Request $request
     * @param ProfileRepository $profileRepository
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, ProfileRepository $profileRepository){

        $profileRepository->update(Auth::user(), $request);

        return $this->response->array(['avatarUrl' => Auth::user()->prof_pic])->setStatusCode(201);
    }
}

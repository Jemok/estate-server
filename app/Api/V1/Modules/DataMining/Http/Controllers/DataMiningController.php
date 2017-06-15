<?php

namespace App\Api\V1\Modules\DataMining\Http\Controllers;

use App\Api\V1\Modules\DataMining\Repositories\DataMiningRepository;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataMiningController extends Controller
{
    use Helpers;

    public function search(Request $request, DataMiningRepository $dataMiningRepository){

        return $this->response->array($dataMiningRepository->search($request->all()));
    }
}

<?php

namespace App\Api\V1\Modules\Property\Http\Controllers;

use App\Api\V1\Modules\Property\Http\Transformers\PropertyTransformer;
use App\Api\V1\Modules\Property\Repositories\PropertyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function index(PropertyRepository $propertyRepository, PropertyTransformer $propertyTransformer){

        return $propertyTransformer->transformCollection($propertyRepository->index());
    }
}

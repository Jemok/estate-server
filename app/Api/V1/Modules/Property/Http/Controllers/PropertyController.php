<?php

namespace App\Api\V1\Modules\Property\Http\Controllers;

use App\Api\V1\Modules\Property\Http\Transformers\PropertyTransformer;
use App\Api\V1\Modules\Property\Repositories\PropertyRepository;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    use Helpers;

    public function index(PropertyRepository $propertyRepository, PropertyTransformer $propertyTransformer){

        return $propertyTransformer->transformCollection($propertyRepository->index());
    }

    public function show(Request $request, PropertyRepository $propertyRepository, PropertyTransformer $propertyTransformer){

        return $propertyTransformer->transform($propertyRepository->show($request->houseId));
    }

    public function store(Request $request, PropertyRepository $propertyRepository){

        $propertyRepository->store($request->all());

        return $this->response->array(['message' => 'Property was successfully added'])->setStatusCode(201);
    }

    public function update(Request $request, PropertyRepository $propertyRepository){

        $propertyRepository->update($request->all());

        return $this->response->array(['message' => 'Property was successfully updated'])->setStatusCode(201);
    }

    public function delete(Request $request, PropertyRepository $propertyRepository){

        $propertyRepository->delete($request->all());

        return $this->response->array(['message' => 'Property was successfully deleted'])->setStatusCode(201);
    }

    public function image(Request $request, PropertyRepository $propertyRepository){

        $propertyRepository->image($request->all());

        return $this->response->array(['message' => 'Image was successfully uploaded'])->setStatusCode(201);
    }
}

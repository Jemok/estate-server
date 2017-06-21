<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/15/17
 * Time: 1:58 PM
 */

namespace App\Api\V1\Modules\Property\Repositories;


use App\Api\V1\Modules\Property\Models\Image;
use App\DataminingOption;

class PropertyRepository
{

    public function show($house_id){

        return DataminingOption::findOrFail($house_id);
    }

    public function index(){
        return DataminingOption::latest()->get();
    }

    public function store(array $propertyData){

        $model = new DataminingOption();

        $model->car_pack       = $propertyData['parking'];
        $model->garden         = $propertyData['garden'];
        $model->one_bedroom    = $propertyData['one_bedroom'];
        $model->two_bedroom    = $propertyData['two_bedroom'];
        $model->three_bedroom  = $propertyData['three_bedroom'];
        $model->one_bathroom   = $propertyData['one_bathroom'];
        $model->two_bathroom   = $propertyData['two_bathroom'];
        $model->three_bathroom = $propertyData['three_bathroom'];
        $model->guest_room     = $propertyData['guest_room'];
        $model->library        = $propertyData['library'];
        $model->solar_pannels  = $propertyData['solar_pannels'];
        $model->house_name     = $propertyData['property'];
        $model->location       = $propertyData['location'];
        $model->description    = $propertyData['description'];
        $model->price          = $propertyData['price'];
        $model->owner          = $propertyData['owner'];
        $model->email          = $propertyData['email'];
        $model->phone          = $propertyData['phone'];

        $model->save();
    }

    public function update(array $propertyData){

        $model = DataminingOption::findOrFail($propertyData['houseId']);

        $model->car_pack       = $propertyData['parking'];
        $model->garden         = $propertyData['garden'];
        $model->one_bedroom    = $propertyData['one_bedroom'];
        $model->two_bedroom    = $propertyData['two_bedroom'];
        $model->three_bedroom  = $propertyData['three_bedroom'];
        $model->one_bathroom   = $propertyData['one_bathroom'];
        $model->two_bathroom   = $propertyData['two_bathroom'];
        $model->three_bathroom = $propertyData['three_bathroom'];
        $model->guest_room     = $propertyData['guest_room'];
        $model->library        = $propertyData['library'];
        $model->solar_pannels  = $propertyData['solar_pannels'];
        $model->house_name     = $propertyData['propertyName'];
        $model->location       = $propertyData['location'];
        $model->description    = $propertyData['description'];
        $model->price          = $propertyData['price'];
        $model->owner          = $propertyData['owner'];
        $model->email          = $propertyData['email'];
        $model->phone          = $propertyData['phone'];

        $model->save();
    }

    public function delete(array $propertyData){

        $model = DataminingOption::findOrFail($propertyData['houseId']);

        $model->delete();

    }

    public function image(array $propertyData){

        $model = new Image();

        $model->image = $propertyData['image'];
        $model->datamining_option_id = $propertyData['houseId'];

        $model->save();
    }
}
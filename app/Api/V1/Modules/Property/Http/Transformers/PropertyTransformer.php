<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/15/17
 * Time: 1:40 PM
 */

namespace App\Api\V1\Modules\Property\Http\Transformers;


class PropertyTransformer
{
    public function transform($property){
        return [
            'houseName' => (string)   $property->house_name,
            'location'  => (string)   $property->location,
            'description' => (string) $property->description,
            'price'       => (string) $property->price
        ];
    }

    public function transformCollection($properties){
        if($properties->count()){
            foreach ($properties as $property){
                $data[] = $this->transform($property);
            }
            return $data;
        }

        return [];
    }
}
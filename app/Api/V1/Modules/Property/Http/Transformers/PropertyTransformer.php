<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/15/17
 * Time: 1:40 PM
 */

namespace App\Api\V1\Modules\Property\Http\Transformers;


use App\Api\V1\Modules\Property\Models\Image;
use App\Api\V1\Modules\Property\Repositories\ImageRepository;

class PropertyTransformer
{
    public function transform($property){

        $imageTransformer = new ImageTransformer();
        $imageRepository = new ImageRepository();

        return [
            'houseId'      => (integer)   $property->id,
            'houseName'    => (string)    $property->house_name,
            'location'     => (string)    $property->location,
            'description'  => (string)  $property->description,
            'price'        => (string)  $property->price,
            'carPack'      => (integer) $property->car_pack,
            'garden'       => (integer) $property->garden,
            'oneBedroom'   => (integer) $property->one_bedroom,
            'twoBedroom'   => (integer) $property->two_bedroom,
            'threeBedroom' => (integer) $property->three_bedroom,
            'oneBathroom'  => (integer) $property->one_bathroom,
            'twoBathroom'  => (integer) $property->two_bathroom,
            'threeBathroom'=> (integer) $property->three_bathroom,
            'guestRoom'    => (integer) $property->guest_room,
            'library'      => (integer) $property->library,
            'owner'        =>  (string) $property->owner,
            'email'        => (string)  $property->email,
            'image'        => (string)  $this->getMainImage($property->id),
            'phone'        =>  (string) $property->phone,
            'solarPannels' => (integer) $property->solar_pannels,
            'createdAt'    => (string)  $property->created_at,
            'images'       => $imageTransformer->transformCollection($imageRepository->indexForHouse($property->id))
        ];
    }

    public function getMainImage($houseId){

        if(Image::where('datamining_option_id', $houseId)->exists()){
            return Image::where('datamining_option_id', $houseId)->get()->last()->image;
        }

        return null;

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
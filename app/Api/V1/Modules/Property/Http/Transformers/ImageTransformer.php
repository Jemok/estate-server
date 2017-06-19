<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/19/17
 * Time: 7:35 AM
 */

namespace App\Api\V1\Modules\Property\Http\Transformers;


class ImageTransformer
{
    public function transform($image){
        return [
            'imageId'      => (integer)   $image->id,
            'image'        => (string)    $image->image,
            'houseId'      => (integer)   $image->datamining_option_id
        ];
    }

    public function transformCollection($images){
        if($images->count()){
            foreach ($images as $image){
                $data[] = $this->transform($image);
            }
            return $data;
        }

        return [];
    }
}
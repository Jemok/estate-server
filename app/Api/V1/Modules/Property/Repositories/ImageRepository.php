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

class ImageRepository
{


    public function indexForHouse($houseId){
        return Image::where('datamining_option_id', $houseId)->latest()->get();
    }

}
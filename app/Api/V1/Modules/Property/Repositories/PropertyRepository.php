<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/15/17
 * Time: 1:58 PM
 */

namespace App\Api\V1\Modules\Property\Repositories;


use App\DataminingOption;

class PropertyRepository
{
    public function index(){
        return DataminingOption::get();
    }

}
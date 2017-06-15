<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/17/17
 * Time: 2:09 PM
 */

namespace App\Api\V1\Transformer;


abstract class Transformer
{
    public function transformCollection(array $items){

        return array_map([$this, 'transform'], $items);
    }

    abstract public function transform($item);
}
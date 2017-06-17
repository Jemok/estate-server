<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/15/17
 * Time: 11:18 AM
 */

namespace App\Api\V1\Modules\DataMining\Repositories;

class DataMiningRepository
{

    public function getRows($sql) {

        $link = mysqli_connect("localhost", "root", "*jackie123#", 'real_estate');

        $result = mysqli_query($link, $sql);

        while($row = mysqli_fetch_array($result)){
            $ret[] = $row;
        }

        return $ret;
    }


    public function search(array $request) {

        $rows = $this->getRows("SELECT * FROM datamining_options");

        $distance = array_fill(0, count($rows), 0);

        $instance = $request['instance'];


        for($i = 0; $i < count($rows); $i++) {

            for($j = 1; $j < 11; $j++) {
                if($rows[$i][$j] != $instance[$j])
                    $distance[$i]++;
            }

        }

        asort($distance);


        $kclosest = [];

        $x = 0;

        foreach($distance as $key => $d) {
            if(++$x <= 2) {
                array_push($kclosest,$rows[$key][11]);
//                 $kclosest[$rows[$key][11]]++;
                $newdistance[$key] = $d;
            }
        }

//        var_dump($newdistance);

//        arsort($kclosest);
        $diagnosis = key($kclosest);

//        var_dump($diagnosis);

        return $newdistance;
    }
}
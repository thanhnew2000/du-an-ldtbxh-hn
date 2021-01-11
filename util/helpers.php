<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 6/4/20
 * Time: 15:19
 */
use Carbon\Carbon;

// $arrayss = [1,2,3,4,5];

function getCurrentYear($number){
    $timeNow = Carbon::now();
    $yearNow = $timeNow->year;
    $tenYearCurrent=[];
    for($i = $yearNow ; $i >= ($yearNow - $number) ; $i--){
        array_push($tenYearCurrent,$i);
    }
    return $tenYearCurrent;
}
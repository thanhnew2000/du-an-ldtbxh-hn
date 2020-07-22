<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 6/4/20
 * Time: 15:19
 */
use Carbon\Carbon;

// $arrayss = [1,2,3,4,5];

function getCurrentTenYear(){
    // $timeNow = Carbon::now();
    // $yearNow = $timeNow->year;
    $tenYearCurrent=[1,2,3,4,5];
    // for($i = $yearNow ; $i >= ($yearNow - 10) ; $i--){
    //     $tenYearCurrent.push($i);
    // }
    return $tenYearCurrent;
}
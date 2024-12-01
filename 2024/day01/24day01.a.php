<?php
/**
 * 2024 Advent of Code: Day 1: Puzzle 1
 * 
 * lathrop preston 2024/12/01
 * 
 */

// read in the raw location data 
$locations_raw = file(__DIR__ . '\24day01.dat');
// var_dump($locations_raw);
// echo count($locations_raw);

// parse each data row into the two lists
foreach ($locations_raw as $row) {
    $row_list = explode("   ", $row);
    /**
     * as a test I used the ids as indexes, 
     * the lists have different numbers of distinct values
     * so not doing it this way for now
     * $left_list[$row_list[0]]=$row_list[0];
     * $right_list[$row_list[1]]=$row_list[1];
    */
    $left_list[]=$row_list[0];
    $right_list[]=$row_list[1];
}
//echo count($left_list)." - ".count($right_list);

//itterate and calculate total distance
$total_distance = 0;
foreach ($left_list as $index=>$left_location_id) {
    $right_location_id = $right_list[$index];
    $distance = abs($left_location_id-$right_location_id); //note some distances are - so abs()
    //echo $distance."\n";
    $total_distance +=$distance;
}

//output 
echo $total_distance;
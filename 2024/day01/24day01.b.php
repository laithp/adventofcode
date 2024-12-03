<?php
/**
 * 2024 Advent of Code: Day 1: Puzzle 2
 * 
 * lathrop preston 2024/12/02
 * 
 */

 // read in the raw location data 
$locations_raw = file(__DIR__ . '\24day01.dat');

// parse each data row into the two lists
foreach ($locations_raw as $row) {
    $row_list = explode("   ", $row);

    $left_val = trim($row_list[0]);
    $left_list[$left_val]=0;

    $right_val = trim($row_list[1]);
    if(isset($right_list[$right_val])){
        $right_list[$right_val]++;
    }else{
        $right_list[$right_val]=1;
    }
}
//var_dump($right_list);
//echo count($right_list);
foreach($left_list as $left_loc=>$tally){

   if(isset($right_list[$left_loc])){
        $left_list[$left_loc] = $left_loc * $right_list[$left_loc];
    }else{
        //gndn
    }
}
//var_dump($left_list);

echo array_sum($left_list);
<?php
/**
 * Answer for 2023 Day 2 in PHP
 * https://adventofcode.com/2023/day/2
 * 
 * By Lathrop Preston 11/23/2024-11/24/2004
 * 
 */

$game_data_raw = file(__DIR__ . '\day02-input.txt');

function Extract_draws($raw_draws) {

    $draws = explode(";", $raw_draws);
    foreach($draws as $draw){
        $sets = explode(",",$draw);
        $color_set = array();
        foreach($sets as $color){
            $color_cl = trim($color);
           $color_set[substr($color_cl,strpos($color_cl, " ")+1)] =  substr($color_cl,0,strpos($color_cl, " ")); 
        }
        $draw_sets[] = $color_set;
    }
    return $draw_sets;
}

function extract_game_data($game_data) {
    $gd_cleaned = trim($game_data);
    
    $colonpos = strpos($gd_cleaned, ":");
    $game_number = str_replace("Game ","",substr($gd_cleaned, 0, $colonpos));
    $game_draws_raw = extract_draws( trim(substr($gd_cleaned, $colonpos+1)) );
    
    return array("number"=>$game_number,"draws"=>$game_draws_raw);
}

function process_game_data($game_data){
    

    $maxes = array("red"=>null,"green"=>null,"blue"=>null);
    foreach($game_data as $draw){
        if(isset($draw["red"]) && $maxes["red"]<$draw["red"]){
            $maxes["red"]=$draw["red"];
        };
        if(isset($draw["green"]) && $maxes["green"]<$draw["green"]){
            $maxes["green"]=$draw["green"];
        };
        if(isset($draw["blue"]) && $maxes["blue"]<$draw["blue"]){
            $maxes["blue"]=$draw["blue"];
        };
    }
    $power = $maxes["red"]*$maxes["green"]*$maxes["blue"];

    return $power;
}

$total = 0;
foreach($game_data_raw as $game_data){
    $gde = extract_game_data($game_data);
    $total += process_game_data($gde["draws"]);
}

echo $total;

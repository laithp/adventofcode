<?php
/**
 * Answer for 2023 Day 1 in PHP
 * https://adventofcode.com/2023/day/1
 * 
 */

$calibration_data_raw = file(__DIR__.'\day1-input.txt');
$calibration_data = 0;
//var_dump($calibration_data_raw);
    foreach($calibration_data_raw as $cal_dat_raw){
        $cal_dat_raw_trm = trim($cal_dat_raw);
        //echo $cal_dat_raw_trm . " --> ";
        $cal_dat_clean = mb_eregi_replace('[a-z]', '', $cal_dat_raw_trm);
        //echo $cal_dat_clean . " --> ";
        $cal_dat_clean_first = substr($cal_dat_clean, 0, 1);
        $cal_dat_clean_last = substr($cal_dat_clean, -1, 1);

        $cal_dat = $cal_dat_clean_first . $cal_dat_clean_last;
        //echo $cal_dat."\n";
        $calibration_data += $cal_dat;
    }
    echo $calibration_data;
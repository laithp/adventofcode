<?php
/**
 * 2024 Advent of Code: Day 2: Puzzle 1
 * 
 * lathrop preston 2024/12/02-03
 * 
 */

// read in the raw reactor data 
$data_raw = file(__DIR__ . '\24day02.dat');

$safe_tally = 0;
foreach($data_raw as  $ind => $row){
//echo $ind.": ";

    $report_dat = explode(" ", trim($row));
    //var_dump($report_dat);
    
    $last = null;
    $passed = true;
    $ascdec = null;
    foreach($report_dat as $reading){
        if($last===null){ 
            $last = $reading;
//echo "1st * ";
            continue; 
        }else{
            $dif = $last - $reading;
            if ($dif<0) {
                if ($ascdec===null) { 
                    $ascdec='dec'; 
                }elseif($ascdec=='asc'){
                    $passed = false;
                }
                if (abs($dif)<1 || abs($dif)>3) {
                    $passed = false; 
                }
            } elseif ($dif>0) {
//echo '+';
                if ($ascdec===null) { 
                    $ascdec='asc'; 
                }elseif($ascdec=='dec'){
                    $passed = false;
                }
                if ($dif<1 || $dif>3) {
                    $passed = false;
                }
            }else{
                $passed = false;
            }
//echo $dif." * ";
            $last = $reading;
        }
    
    }
//echo " == ".$passed."\n";
    if($passed){
        $safe_tally++;
    }

} 
echo $safe_tally;



<?php
/**
 * 2024 Advent of Code: Day 2: Puzzle 2
 * 
 * lathrop preston 2024/12/03
 * 
 */

// read in the raw reactor data 
$data_raw = file(__DIR__ . '\24day02.dat');


$safe_tally = 0;
foreach($data_raw as  $ind => $row){
echo $ind.": ";

$fail_total = 0;
    $report_dat = explode(" ", trim($row));
    //var_dump($report_dat);
    
    $last = null;
    $passed = true;
    $ascdec = null;
    foreach($report_dat as $reading){
        if($last===null){ 
            $last = $reading;
echo "1st * ";
            continue; 
        }else{
            $dif = $last - $reading;
            if ($dif<0) {
                if ($ascdec===null) { 
                    $ascdec='dec'; 
                }elseif($ascdec=='asc'){
                    //$passed = false;
                    $fail_total++;
                    if($fail_total<2){
                        continue; 
                    }
                    
                }
                if (abs($dif)<1 || abs($dif)>3) {
                    //$passed = false;
                    $fail_total++; 
                    if($fail_total<2){
                        continue; 
                    }
                }
            } elseif ($dif>0) {
echo '+';
                if ($ascdec===null) { 
                    $ascdec='asc'; 
                }elseif($ascdec=='dec'){
                    //$passed = false;
                    $fail_total++;
                    if($fail_total<2){
                        continue; 
                    }
                }
                if ($dif<1 || $dif>3) {
                    //$passed = false;
                    $fail_total++;
                    if($fail_total<2){
                        continue; 
                    }
                }
            }else{
                //$passed = false;
                $fail_total++;
                if($fail_total<2){
                    continue; 
                }
            }
echo $dif." * ";
            //if($fail_total<2){
                $last = $reading;        
            //}
            
        }
    
    }
echo " == ".$fail_total;
    if($fail_total<2){
echo " -- S ";
      echo  $safe_tally++;
    }
echo "\n";

} 
echo $safe_tally;
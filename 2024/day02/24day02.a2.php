<?php
/**
 * 2024 Advent of Code: Day 2: Puzzle 1
 * 
 * lathrop preston 2024/12/03 - 
 * refactored version to make it hopefully easier to do the puzzle 2 implementation
 * 
 */

class Rudolph {
    
    var $raw_data = null;
    var $isascending = null;
    var $rep = 1;
    function __construct( $raw_data )
    {
         $this->raw_data = file(__DIR__ . '\\'.$raw_data);
        //var_dump($this->raw_data);
    }

    function process_red_nose_reports(){

        $safe_tally = 0;
        $previous_reading = null;
        foreach ($this->raw_data as $data_index =>  $report) {
            $this->isascending = null;
            $report_data = explode(" ", trim($report));
            //var_dump($report_data); 

            $issafe = true;
            foreach ($report_data as $read_index => $reading) {
                if ($read_index>0) {
                    if (!$this->compare_red_nose_reports($previous_reading, $reading)) {
                        $issafe = false;
                    }

                }
                
                $previous_reading = $reading;
            }
            if ($issafe) {
                $safe_tally++;
            }

            //exit;
        }
        echo $safe_tally;
    }

    function compare_red_nose_reports($previous_reading, $current_reading) {
        $isgood = true;
        //echo $previous_reading." - ".$current_reading." = ";
        $difference = $previous_reading - $current_reading;
       // echo $difference." -> ";
        if ($this->isascending===null) {
            //echo $this->rep++."* ";
            $this->isascending = ($difference>0)?false:true;
        }
        if ($difference==0) {
            $isgood = false; //echo " X- ";
        } elseif ($difference<0 && !$this->isascending) {
            $isgood = false; //echo " < ";
        } elseif ($difference>0 && $this->isascending) {
            $isgood = false; //echo " > ";
        } elseif( abs($difference)<1 || abs($difference)>3) {
            $isgood = false;
        }
        //echo " -- ".$isgood;
        //echo "\n";
        return $isgood;
    }
}

$rrnr = new Rudolph('24day02.dat');
$rrnr->process_red_nose_reports();

//echo @$safe_tally; // solution == 236



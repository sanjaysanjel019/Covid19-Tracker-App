<?php

$jsonData = file_get_contents("https://pomber.github.io/covid19/timeseries.json");

// json_decodes changes the data into object and adding true converts it into an associative arary
$data = json_decode($jsonData, true);


foreach ($data as $key => $value) {
    $days_count = count($value) - 1;
    $days_count_prev = $days_count - 1;
}


$total_confirmed_cases = 0;
$total_recovered = 0;
$total_deaths = 0;


foreach ($data as $key => $value) {
    $total_confirmed_cases += $value[$days_count]['confirmed'];
    $total_recovered +=  $value[$days_count]['recovered'];
    $total_deaths +=  $value[$days_count]['deaths'];
}

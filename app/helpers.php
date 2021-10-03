<?php

function format_currency($value){
    $convert = str_replace(".", "", $value);
    return (double)str_replace(",", ".", $convert);
}

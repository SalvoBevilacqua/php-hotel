<?php

$hotels_filtered = $hotels;

if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
    if ($filter == 'yes') {
        $temp_array = array_filter($hotels_filtered, fn ($hotel) => $hotel['parking'] === true);
        $hotels_filtered = $temp_array;
    } elseif ($filter == 'none') {
        $temp_array = array_filter($hotels_filtered, fn ($hotel) => $hotel['parking'] === false);
        $hotels_filtered = $temp_array;
    }
}

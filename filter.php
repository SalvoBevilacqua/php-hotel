<?php

$hotels_filtered_park = $hotels;
$hotels_filtered = $hotels;

// imposto la condizione per non far partire il filtro all'avvio della pagina
if (isset($_GET['filter']) && isset($_GET['vote'])) {
    $vote = $_GET['vote'];
    $filter = $_GET['filter'];
    // imposto la condizione nel caso in cui siano filtrati entrambi
    if ($vote != 'all' && $filter != 'all') {
        if ($filter == 'yes') {
            $temp_array_filter = array_filter($hotels_filtered, fn ($hotel) => $hotel['parking'] === true);
            $hotels_filtered_park = $temp_array_filter;
        } else if ($filter == 'none') {
            $temp_array_filter = array_filter($hotels_filtered, fn ($hotel) => $hotel['parking'] === false);
            $hotels_filtered_park = $temp_array_filter;
        }
        if ($vote == '1') {
            $temp_array_filter = array_filter($hotels_filtered_park, fn ($hotel) => $hotel['vote'] < 4);
            $hotels_filtered = $temp_array_filter;
        } else {
            $temp_array_filter = array_filter($hotels_filtered_park, fn ($hotel) => $hotel['vote'] > 3);
            $hotels_filtered = $temp_array_filter;
        }
    }
    // imposto la condizione nel caso in cui sia filtrato solo il parcheggio
    if ($filter != 'all') {
        if ($filter == 'yes') {
            $temp_array_filter = array_filter($hotels_filtered, fn ($hotel) => $hotel['parking'] === true);
            $hotels_filtered = $temp_array_filter;
        } else {
            $temp_array_filter = array_filter($hotels_filtered, fn ($hotel) => $hotel['parking'] === false);
            $hotels_filtered = $temp_array_filter;
        }
    }
    // imposto la condizione nel caso in cui sia filtrato solo il voto
    if ($vote != 'all') {
        $vote = $_GET['vote'];
        if ($vote == '1') {
            $temp_array_filter = array_filter($hotels_filtered, fn ($hotel) => $hotel['vote'] < 4);
            $hotels_filtered = $temp_array_filter;
        } else {
            $temp_array_filter = array_filter($hotels_filtered, fn ($hotel) => $hotel['vote'] > 3);
            $hotels_filtered = $temp_array_filter;
        }
    }
}

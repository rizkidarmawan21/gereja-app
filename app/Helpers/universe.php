<?php

use App\Models\Event;
use App\Models\RegIbadah;

// use Illuminate\Routing\Route;

if (!function_exists('set_active')) {
    function set_active($uri, $output = "active")
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}

function getCountRegisterByCapacities($capacity_id){
    $count = RegIbadah::where('capacity_id', $capacity_id)->count();
    return $count;
}

function getCountRegisterByEvent($event_id){
    $count = RegIbadah::where('event_id', $event_id)->count();
    return $count;
}
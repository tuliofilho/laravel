<?php

Route::get('/', function () {
    // return view('welcome');
    try {
        DB::connection()->getPdo();
        $caught = false;
    } catch (Exception $e) {
        $caught = true;
        die("Could not connect to the database.  Please check your configuration. error:" . $e );
    }

    if(!$caught){
        echo 'Hello, world.';
    }
});


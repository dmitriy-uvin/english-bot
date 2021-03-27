<?php

$botman = app('botman');

$botman->hears('/start', 'App\Http\Controllers\StartController@start');

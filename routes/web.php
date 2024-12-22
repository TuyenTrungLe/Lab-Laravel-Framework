<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Log;

Route::get('/test-slack-log', function () {
    Log::channel('slack')->error('Test error message sent to Slack!');
    return 'Log has been sent to Slack!';
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

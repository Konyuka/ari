<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use Inertia\Inertia;


Route::get('/', function () {
    return view('app');
});

Route::inertia('/', 'Welcome');
Route::inertia('/agent', 'Agent');
Route::inertia('/stats', 'Stats');

Route::get('/stats', [ApplicationController::class, 'stats']);


Route::get('/deviceStates', [ApplicationController::class, 'devices']);
Route::post('/deviceStates/{deviceName}', [ApplicationController::class, 'deviceId']);

Route::get('/bridges', [ApplicationController::class, 'bridges']);
Route::post('/bridges/{bridgeId}', [ApplicationController::class, 'bridgeId']);

Route::get('/endpoints', [ApplicationController::class, 'endpoints']);
Route::post('/endpoints/{tech}', [ApplicationController::class, 'endpointTech']);
Route::post('/endpoints/{tech}/{resource}', [ApplicationController::class, 'endpointTechFilter']);

Route::get('/channels', [ApplicationController::class, 'channels']);
Route::post('/channels', [ApplicationController::class, 'postChannel']);
Route::post('/channels/{channelId}/variable', [ApplicationController::class, 'channelID']);
Route::post('/channels/{channelId}', [ApplicationController::class, 'channelIdDetail']);
Route::post('/channels/{channelId}/rtp_statistics', [ApplicationController::class, 'channelRTPStats']);

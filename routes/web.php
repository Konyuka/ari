<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DialController;
use Inertia\Inertia;


Route::get('/', function () {
    return view('app');
});

Route::inertia('/', 'Welcome');
Route::inertia('/agent', 'Agent');
Route::inertia('/stats', 'Stats');

Route::inertia('/Dial', 'Dial')->name('dial');
Route::post('/dial/channels/create', [DialController::class, 'createChannel']);
Route::post('/dial/channels/{channelId}/dial', [DialController::class, 'dialChannel']);
Route::post('/dial/bridges/{bridgeId}/addChannel', [DialController::class, 'addChannelToBridge']);
Route::post('/dial/bridges/{bridgeId}/removeChannel', [DialController::class, 'removeChannelFromBridge']);
Route::post('/outside', [DialController::class, 'dialOutside']);



Route::get('/stats', [ApplicationController::class, 'stats']);


Route::get('/deviceStates', [ApplicationController::class, 'devices']);
Route::post('/deviceStates/{deviceName}', [ApplicationController::class, 'deviceId']);

Route::get('/bridges', [ApplicationController::class, 'bridges']);
Route::post('/bridges/{bridgeId}', [ApplicationController::class, 'bridgeId']);
Route::post('/bridges', [ApplicationController::class, 'createBridge']);
Route::post('/bridge/{bridgeId}', [ApplicationController::class, 'updateBridge']);
Route::post('/bridges/{bridgeId}/addChannel', [ApplicationController::class, 'addChannelToBridge']);
Route::post('/bridges/{bridgeId}/removeChannel', [ApplicationController::class, 'removeChannelFromBridge']);
Route::post('/bridges/{bridgeId}/moh', [ApplicationController::class, 'mohBridge']);
Route::post('/bridges/{bridgeId}/record', [ApplicationController::class, 'recordBridge']);

Route::get('/endpoints', [ApplicationController::class, 'endpoints']);
Route::post('/endpoints/{tech}', [ApplicationController::class, 'endpointTech']);
Route::post('/endpoints/{tech}/{resource}', [ApplicationController::class, 'endpointTechFilter']);

Route::get('/channels', [ApplicationController::class, 'channels'])->name('channelsRoute');
Route::post('/channels', [ApplicationController::class, 'postChannel']);
Route::post('/channels/create', [ApplicationController::class, 'createChannel']);
Route::post('/channels/{channelId}', [ApplicationController::class, 'createChannelWithId']);
Route::post('/channels/{channelId}/continue', [ApplicationController::class, 'continuePriority']);
Route::post('/channels/{channelId}/move', [ApplicationController::class, 'moveChannel']);
Route::post('/channels/{channelId}/redirect', [ApplicationController::class, 'redirectChannel']);
Route::post('/channels/{channelId}/answer', [ApplicationController::class, 'answerChannel']);
Route::post('/channels/{channelId}/ring', [ApplicationController::class, 'ringChannel']);
Route::post('/channels/{channelId}/dtmf', [ApplicationController::class, 'sendDTMF']);
Route::post('/channels/{channelId}/mute', [ApplicationController::class, 'holdChannel']);
Route::post('/channels/{channelId}/hold', [ApplicationController::class, 'muteChannel']);
Route::post('/channels/{channelId}/moh', [ApplicationController::class, 'mohChannel']);
Route::post('/channels/{channelId}/silence', [ApplicationController::class, 'silenceChannel']);
Route::post('/channels/{channelId}/record', [ApplicationController::class, 'recordChannel']);
Route::post('/channels/{channelId}/dial', [ApplicationController::class, 'dialChannel']);
Route::post('/channels/{channelId}/variable', [ApplicationController::class, 'channelID']);
Route::post('/channel/{channelId}', [ApplicationController::class, 'channelIdDetail']);
Route::post('/channels/{channelId}/rtp_statistics', [ApplicationController::class, 'channelRTPStats']);

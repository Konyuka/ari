<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stats(Request $request)
    {
        $endpointResponse = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/endpoints?api_key=smartdial:password', []);
        $endpointData = $endpointResponse->collect();

        $channelResponse = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/channels?api_key=smartdial:password', []);
        $channelData = $channelResponse->collect();
        
        $bridgeResponse = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/bridges?api_key=smartdial:password', []);
        $bridgeData = $bridgeResponse->collect();

        return Inertia::render('Stats', [
            'endpoint' => $endpointData,
            'channel' => $channelData,
            'bridge' => $bridgeData,
        ]);
    }
    
    public function deviceId(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/deviceStates/SIP%2F'.$request->name.'?api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Devices', [
            'deviceStateId' => $data,
        ]);
    }

    public function devices(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/deviceStates?api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Devices', [
            'deviceState' => $data,
        ]);
    }

    public function endpointTechFilter(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/endpoints/'.$request->tech.'/'.$request->resource.'?api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Endpoints', [
            'endpoints' => $data,
        ]);
    }

    public function endpointTech(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/endpoints/'.$request->type.'?api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Endpoints', [
            'endpointTech' => $data,
        ]);
    }

    public function endpoints(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/endpoints?api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Endpoints', [
            'endpoints' => $data,
        ]);
    }

    public function recordBridge(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/bridges/'.$request->bridgeId.'/record?name=test&format=gsm&ifExists=fail&terminateOn=none&api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Bridges', [
            'bridgeId' => $data,
        ]);
    }

    public function mohBridge(Request $request)
    {http://172.16.10.210:8088/ari/bridges/123/record?name=test&format=gsm&ifExists=fail&terminateOn=none&api_key=smartdial:password
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/bridges/'.$request->bridgeId.'/moh?api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Bridges', [
            'bridgeId' => $data,
        ]);
    }

    public function removeChannelFromBridge(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/bridges/'.$request->bridgeId.'/removeChannel?channel='.$request->channelId.'&api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Bridges', [
            'bridgeId' => $data,
        ]);
    }
    
    public function addChannelToBridge(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/bridges/'.$request->bridgeId.'/addChannel?channel='.$request->channelId.'&api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Bridges', [
            'bridgeId' => $data,
        ]);
    }

    public function updateBridge(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/bridges?type='.$request->type.'&bridgeId='.$request->bridgeId.'&name='.$request->name.'%20&api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Bridges', [
            'bridgeId' => $data,
        ]);
    }

    public function createBridge(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/bridges?type='.$request->type.'&bridgeId='.$request->bridgeId.'&name='.$request->name.'%20&api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Bridges', [
            'bridgeId' => $data,
        ]);
    }

    public function bridgeId(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/bridges/'.$request->id.'?api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Bridges', [
            'bridgeId' => $data,
        ]);
    }

    public function bridges(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/bridges?api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Bridges', [
            'bridges' => $data,
        ]);
    }

    public function dialChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'/dial?api_key=smartdial:password', []);
        $data = $response->collect();

        return redirect()->route('channelsRoute')->with('successMessage', 'Moved Succesfully!');
    
    }

    public function recordChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'/record?name=recoding2&format=gsm&ifExists=fail&terminateOn=none&api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Moved Succesfully!');
    
    }

    public function silenceChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'/silence?api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Moved Succesfully!');
    
    }

    public function mohChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'/moh?api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Moved Succesfully!');
    
    }

    public function holdChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'/hold?api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Moved Succesfully!');
    
    }


    public function muteChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'/mute?direction='.$request->muteMode.'&api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Moved Succesfully!');
    
    }

    public function sendDTMF(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'/dtmf?dtmf='.$request->dtmf.'&between=100&duration=100&api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Moved Succesfully!');
    
    }

    public function ringChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'/ring?api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Moved Succesfully!');
    
    }

    public function answerChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->callExt.'/answer?api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Moved Succesfully!');
    
    }

    public function redirectChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'/redirect?endpoint=SIP%2F'.$request->callExt.'&api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Moved Succesfully!');
    
    }

    public function moveChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'/move?app='.$request->app.'&api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Moved Succesfully!');
    
    } 

    public function continuePriority(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'/continue?api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Priority Resuming!');
    
    } 
    
    public function createChannelWithId(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->channelID.'?endpoint=SIP%2F'.$request->callExt.'&extension='.$request->callExt.'&timeout=30&api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('channelsRoute')->with('successMessage', 'Channel was successfully added!');
    
    } 

    public function createChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/create?endpoint=SIP%2F'.$request->ext.'&app=hello-world&api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('dial')->with('successMessage', 'Channel was successfully added!');
    
    }    

    public function postChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels?endpoint=SIP%2F'.$request->callExt.'&extension='.$request->callExt.'&timeout=30&api_key=smartdial:password', []);
        $data = $response->collect();
        // return dd($response->collect());  
        return Inertia::render('Admin', [
            'callResponse' => $data,
        ]);
    }

    public function channels(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/channels?api_key=smartdial:password', []);
        $data = $response->collect();
        // return dd($response->collect());  
        return Inertia::render('Admin', [
            'response' => $data,
        ]);
    }

    public function channelIdDetail(Request $request)
    {

        $response = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/channels/'.$request->channelId.'?api_key=smartdial:password', []);
        $data = $response->collect();
 
        return Inertia::render('Admin', [
            'channelDetails' => $data,
        ]);
        // return redirect()->route('users.index')->with('successMessage', 'User was successfully updated!');
        
    }

    public function channelRTPStats(Request $request)
    {

        $response = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/channels/'.$request->channelId.'/rtp_statistics?api_key=smartdial:password', []);
        $data = $response->collect();

        return Inertia::render('Admin', [
            'rtp' => $data,
        ]);
        
    }


    public function channelID(Request $request)
    {

        $response = Http::withBasicAuth('smartdial','password')->
        get('http://172.16.10.210:8088/ari/channels/'.$request->channelId.'/variable?variable='.$request->variable.'&api_key=smartdial:password', []);
        $data = $response->collect();

        return Inertia::render('Test', [
            'context' => $data,
        ]);
        
    }
     
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

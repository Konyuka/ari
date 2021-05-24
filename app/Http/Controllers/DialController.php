<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;


class DialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // http://{ARIUser}:{ARIPass}@localhost:8088/ari/channels?endpoint=SIP/{exten to call from}&extension={number/exten to call}&context=from-internal&priority=1&callerId={callerID}
    // "http://192.168.141.235:8088/ari/channels?endpoint=PJSIP/1110&extension=1120&context=from-internal&priority=1&callerId=1110
    // http://localhost:8088/ari/channels?endpoint=SIP%2F0716202298%40GOIP2&context=devices&priority=1&app=hello-world&callerId=500&timeout=30&api_key=smartdial:password

    public function dialOutside(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/?endpoint=SIP/500&extension=0716202298&context=devices&priority=1&callerId=500', []);
        // post('http://172.16.10.210:8088/ari/channels/create?endpoint=SIP%2F'.$request->ext.'&app=hello-world&api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('dial')->with('successMessage', 'Removed Successfully!');
    }    

    public function removeChannelFromBridge(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/bridges/'.$request->bridgeId.'/removeChannel?channel='.$request->channelId.'&api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('dial')->with('successMessage', 'Removed Successfully!');
    }

    public function addChannelToBridge(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/bridges/'.$request->bridgeId.'/addChannel?channel='.$request->channelId.'&api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('dial')->with('successMessage', 'Added Succesfully!'); 

    } 
        
    public function dialChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/'.$request->id.'/dial?api_key=smartdial:password', []);
        $data = $response->collect();
        return redirect()->route('dial')->with('successMessage', 'Moved Succesfully!'); 
        // return Inertia::render('Dial', [
        //     'ringResponse' => $data,
        //     ]
        // );
    
    }     

    public function createChannel(Request $request)
    {
        
        $response = Http::withBasicAuth('smartdial','password')->
        post('http://172.16.10.210:8088/ari/channels/create?endpoint=SIP%2F'.$request->ext.'&app=hello-world&api_key=smartdial:password', []);
        $data = $response->collect();
        return Inertia::render('Dial', [
            'dialResponse' => $data,
            ]
        );

        // redirect()->route('dial')->with('dialResponse', $data);
        // redirect()->route('dial')->with('dialResponse', $data);
        // return back()->with([ 'dialResponse' => $data]);
        // return back()->with([ 'dialResponse' => $data]);
        // return redirect()->route('dial')->with();
    
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

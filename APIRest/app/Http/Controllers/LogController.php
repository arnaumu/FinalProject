<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idServer)
    {
        $server = Server::find($idServer);
        if (!$server) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un log con ese server.'])], 404);
        }
        //return response()->json(['status' => 'ok', 'data' => $server->logs()->get()], 200);
        return response()->json(['status' => 'ok', 'data' => $server->logs()->get()], 200);
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
        $log = Log::find($id);
        if (!$log) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un avión con ese código.'])], 404);
        }
        return response()->json(['status' => 'ok', 'data' => $log], 200);
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

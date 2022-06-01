<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;

class ServerLogController extends Controller
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
    public function store(Request $request, $idServer)
    {
        if (!$request->input('timestamp') || !$request->input('description')) {
            return response()->json(['errors' => array(['code' => 422, 'message' => 'Faltan datos necesarios para el proceso de alta.'])], 422);
        }
        $server = Server::find($idServer);
        if (!$server) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un server con ese código.'])], 404);
        }
        $newLog = $server->logs()->create($request->all());
        return response()->json(['data' => $newLog], 201)->header('Location', url('/api/v1/') . '/new-log/' . $newLog->id);
        // return response()->json(['data' => $newLog], 201)->header('Location', url('/api/v1/') . '/new-log/' . $newLog->serie)->header('Content-Type', 'application/json');
        // return response()-> json(['data'=>$newServer], 201)->header('Location',  url('/api/v1/').'/new-server/'.$newServer->id);
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
    public function update(Request $request, $idServer, $idLog)
    {
        $server = Server::find($idServer);
        if (!$server) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un server con ese código.'])], 404);
        }

        $log = $server->logs()->find($idLog);

        if (!$log) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un avión con ese código asociado al server.'])], 404);
        }

        $timestamp = $request->input('timestamp');
        $description = $request->input('description');

        if ($request->method() === 'PATCH') {
            $bandera = false;

            if ($timestamp) {
                $log->timestamp = $timestamp;
                $bandera = true;
            }

            if ($description) {
                $log->description = $description;
                $bandera = true;
            }

            if ($bandera) {
                $log->save();
                return response()->json(['status' => 'ok', 'data' => $log], 200);
            } else {

                return response()->json(['errors' => array(['code' => 304, 'message' => 'No se ha modificado ningún dato del avión.'])], 304);
            }
        }

        if (!$timestamp || !$description) {
            return response()->json(['errors' => array(['code' => 422, 'message' => 'Faltan valores para completar el procesamiento.'])], 422);
        }

        $log->timestamp = $timestamp;
        $log->description = $description;

        $log->save();

        return response()->json(['status' => 'ok', 'data' => $log], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idServer, $idLog)
    {
        $server = Server::find($idServer);
        if (!$server) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un server con ese código.'])], 404);
        }
        $log = $server->logs()->find($idLog);
        if (!$log) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un log con ese código asociado a ese server.'])], 404);
        }
        $log->delete();
        return response()->json(['code' => 204, 'message' => 'Se ha eliminado el log correctamente.'], 204);
    }
}

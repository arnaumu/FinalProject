<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Server;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Server::all();
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

        if (!$request->input('ipv4') || !$request->input('ipv6') || !$request->input('location') || !$request->input('description')) {
            return response()->json(['errors' => array(['code' => 422, 'message' => 'Faltan datos necesarios para el proceso de alta.'])], 422);
        }
        $newServer = Server::create($request->all());
        return response()->json(['data' => $newServer], 201)->header('Location',  url('/api/v1/') . '/new-server/' . $newServer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $server = Server::find($id);
        if (!$server) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un server con ese id.'])], 404);
        }
        return response()->json(['status' => 'ok', 'data' => $server], 200);
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

        $server = Server::find($id);

        if (!$server) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un server con ese código.'])], 404);
        }

        $ipv4 = $request->input('ipv4');
        $ipv6 = $request->input('ipv6');
        $location = $request->input('location');
        $description = $request->input('description');

        if ($request->method() === 'PATCH') {
            $bandera = false;

            if ($ipv4) {
                $server->ipv4 = $ipv4;
                $bandera = true;
            }

            if ($ipv6) {
                $server->ipv6 = $ipv6;
                $bandera = true;
            }

            if ($location) {
                $server->location = $location;
                $bandera = true;
            }

            if ($description) {
                $server->description = $description;
                $bandera = true;
            }

            if ($bandera) {
                $server->save();
                return response()->json(['status' => 'ok', 'data' => $server], 200);
            } else {
                return response()->json(['errors' => array(['code' => 304, 'message' => 'No se ha modificado ningún dato de server.'])], 304);
            }
        }

        if (!$ipv4 || !$ipv6 || !$location || !$description) {
            return response()->json(['errors' => array(['code' => 422, 'message' => 'Faltan valores para completar el procesamiento.'])], 422);
        }

        $server->ipv4 = $ipv4;
        $server->ipv6 = $ipv6;
        $server->location = $location;
        $server->description = $description;

        $server->save();
        return response()->json(['status' => 'ok', 'data' => $server], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $server = Server::find($id);

        if (!$server) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un server con ese código.'])], 404);
        }

        $logs = $server->logs;

        if (sizeof($logs) > 0) {

            return response()->json(['code' => 409, 'message' => 'Este server posee logs y no puede ser eliminado.'], 409);
        }
        $server->delete();

        return response()->json(['code' => 204, 'message' => 'Se ha eliminado el server correctamente.'], 204);
    }
}

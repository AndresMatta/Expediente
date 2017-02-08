<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Consulta;
use App\Condicion;
use App\Diagnostico;
use App\Laboratorios;
use App\Plan;
use App\Rayos;
use App\Referencias;
use App\Signos;
use App\Paciente;

class ConsultaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recepcion()
    {
        return view('consultas.consulta_recep');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function atencion($id)
    {
        return view('consultas.consulta_atencion',compact('id'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('consultas.consulta_pendientes');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getConsultasEnEspera($espera)
    {
        $consultas = Consulta::where('estado', '<>', $espera)->get();
        foreach ($consultas as $consulta) {

         $paciente = $consulta->paciente;
         $consulta->push($paciente);

        }

        return response()
            ->json([
                'consultas'=> $consultas,
                //'pacientes'=> $pacientes
                ]);
    }

    /**
     * Obtiene la consulta que se está atendiendo
     *
     * @return \Illuminate\Http\Response
     */
    public function getConsulta($id)
    {
        $consulta = Consulta::find($id);
        $paciente = $consulta->paciente;
        $consulta->push($paciente);
        return response()->json($consulta);
    }

    /**
     * Obtiene la consulta en estudio.
     *
     * @return \Illuminate\Http\Response
     */
    public function getConsultaGuardada($id)
    {
        $consulta = Consulta::find($id);

        $condicion = $consulta->condicion;
        $consulta->push($condicion);

        $plan = $consulta->plan;
        $consulta->push($plan);

        $signos = $consulta->signos;
        $consulta->push($signos);

        $laboratorios = $consulta->laboratorios;
        $consulta->push($laboratorios);

        $rayos = $consulta->rayos;
        $consulta->push($rayos);

        $diagnostico = $consulta->diagnostico;
        $consulta->push($diagnostico);

        $referencias = $consulta->referencias;
        $consulta->push($referencias);

        return response()->json($consulta);
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
        //Crea consulta
        $datos = $request->all();
        $id = $datos['consulta_id'];
        $consulta = Consulta::find($id);
        $consulta->fill([
            'estado' => $datos['estado'],
        ]);
        $consulta->save();

        $signos = new Signos(array(
            'presion_arterial' =>  $datos['signos']['presion_arterial'],
            'frecuencia_cardiaca'=> $datos['signos']['frecuencia_cardiaca'],
            'temperatura' => $datos['signos']['temperatura'],
            'peso' => $datos['signos']['peso']
            ));
        $signos = $consulta->signos()->save($signos);

        $condicion = new Condicion(array(
            'sintomas' =>  $datos['inicial']['sintomas'],
            'observaciones'=> $datos['inicial']['observaciones'],
            'dx_inicial' => $datos['inicial']['dx_inicial']
            ));
        $condicion = $consulta->condicion()->save($condicion);

        $plan = new Plan(array(
            'tratamiento' =>  $datos['plan']['tratamiento']
            ));
        $plan = $consulta->plan()->save($plan);

        $laboratorio = new Laboratorios(array(
            'lab' =>  $datos['pruebas']['laboratorio']
            ));
        $laboratorio = $consulta->laboratorios()->save($laboratorio);

        $rayos = new Rayos(array(
            'rx' =>  $datos['pruebas']['rayos']
            ));
        $rayos = $consulta->rayos()->save($rayos);

        $diagnostico = new Diagnostico(array(
            'resultados' =>  $datos['final']['resultados'],
            'indicaciones'=> $datos['final']['indicaciones'],
            'dx' => $datos['final']['dx_final']
            ));
        $diagnostico = $consulta->diagnostico()->save($diagnostico);

        $referencias = new Referencias(array(
            'referencia' =>  $datos['referencias']['referencias']
            ));
        $referencias = $consulta->referencias()->save($referencias);

        return response()->json($datos);
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
        //Datos obtenidos del request.
        $datos = $request->all();
        //Consulta
        $consulta = Consulta::find($id);
        $consulta->fill([
            'estado' => $datos['estado']
        ]);
        $consulta->save();
        //Condicion
        $condicion = $consulta->condicion;
        $condicion->fill([
            'sintomas' => $datos['inicial']['sintomas'],
            'observaciones' => $datos['inicial']['observaciones'],
            'dx_inicial' => $datos['inicial']['dx_inicial'],
        ]);
        $condicion->save();
        //Plan
        $plan = $consulta->plan;
        $plan->fill([
            'tratamiento' => $datos['plan']['tratamiento']
        ]);
        $plan->save();
        //Signos
        $signos = $consulta->signos;
        $signos->fill([
            'presion_arterial' => $datos['signos']['presion_arterial'],
            'frecuencia_cardiaca' => $datos['signos']['frecuencia_cardiaca'],
            'temperatura' => $datos['signos']['temperatura'],
            'peso' => $datos['signos']['peso'],
        ]);
        $signos->save();
        //Laboratorios
        $laboratorios = $consulta->laboratorios;
        $laboratorios->fill([
            'lab' => $datos['pruebas']['laboratorio']
        ]);
        $laboratorios->save();
        //Rayos
        $rayos = $consulta->rayos;
        $rayos->fill([
            'rx' => $datos['pruebas']['rayos']
        ]);
        $rayos->save();
        //Diagnóstico
        $diagnostico = $consulta->diagnostico;
        $diagnostico->fill([
            'resultados' => $datos['final']['resultados'],
            'indicaciones' => $datos['final']['indicaciones'],
            'dx' => $datos['final']['dx_final']
        ]);
        $diagnostico->save();
        //Referencias
        $referencias = $consulta->referencias;
        $referencias->fill([
            'referencia' => $datos['referencias']['referencias']
        ]);
        $referencias->save();

        return response()->json($datos);

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Representante;
use App\Amtropometria;
use App\Visual;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $Alumno = new Alumno();
        $Alumno->escolar = $request->Alumno['cedulaEscolarAlumno'];
        $Alumno->cedula = $request->Alumno['cedulaAlumno'];
        $Alumno->nombre = $request->Alumno['nombreAlumno'];
        $Alumno->apellido = $request->Alumno['apellidoAlumno'];
        $Alumno->sexo_id = $request->Alumno['sexoAlumno'];
        $Alumno->direccion = $request->Alumno['direccionAlumno'];
        $Alumno->nacimiento = $request->Alumno['fechaNacimientoAlumno'];
        $Alumno->telefono = $request->Alumno['telefonoAlumno'];
        $Alumno->save();
        $Alumno->deportes()->attach($request->Alumno['deporteAlumno']);
        $Alumno->socials()->attach($request->Alumno['redesSocialesAlumno']);

        $Representante = new Representante();
        $Representante->cedula = $request->Representante['cedulaRepresentante'];
        $Representante->nombre = $request->Representante['nombreRepresentante'];
        $Representante->apellido = $request->Representante['apellidoRepresentante'];
        $Representante->sexo_id = $request->Representante['sexoRepresentante'];
        $Representante->direccion = $request->Representante['direccionRepresentante'];
        $Representante->nacimiento = $request->Representante['fechaNacimientoRepresentante'];
        $Representante->telefono = $request->Representante['telefonoRepresentante'];
        $Representante->trabajo_id = $request->Representante['trabajoRepresentante'];
        $Representante->parentesco_id = $request->Representante['parentescoRepresentante'];
        $Representante->save();
        $Representante->socials()->attach($request->Representante['redesSocialesRepresentante']);
        $Alumno->representantes()->attach($Representante->id);

        $Amtropometria = new Amtropometria();
        $Amtropometria->talla = $request->Amtropometria['tallaAlumno'];
        $Amtropometria->peso = $request->Amtropometria['pesoAlumno'];
        $Amtropometria->observacion = $request->Amtropometria['observacionesAlumno'];
        $Amtropometria->save();
        $Alumno->amtropometrias()->attach($Amtropometria->id);

        $Visual = new Visual();
        $Visual->lente_id = $request->Visual['lentesAlumno'];
        $Visual->estrabismo_id = $request->Visual['estrabismoAlumno'];
        $Visual->derecho_id = $request->Visual['ojoDerechoAlumno'];
        $Visual->izquierdo_id = $request->Visual['ojoIzquierdoAlumno'];
        $Visual->seguimiento_id = $request->Visual['seguimientoAlumno'];
        $Visual->observacion = $request->Visual['observacionesAlumno'];
        $Visual->save();
        $Alumno->visuals()->attach($Visual->id);
        
        $Alumno->grados()->attach($request->Academico['gradoAlumno']);
        $Alumno->seccions()->attach($request->Academico['seccionAlumno']);
        $Alumno->turnos()->attach($request->Academico['turnoAlumno']);

        return $request;
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

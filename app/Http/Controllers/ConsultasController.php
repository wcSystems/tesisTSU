<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sexo;
use App\Grado;
use App\Seccion;
use App\Role;
use App\Turno;
use App\Boolean;
use App\Deporte;
use App\Parentesco;
use App\Social;
use App\Trabajo;
use App\Vision;
use App\Alumno;
use App\view_alumno_grado;
use App\view_alumno_visual;
use App\view_alumno_representante;
use App\view_alumno_amtropometria;
use App\view_alumno_social_deporte;

class ConsultasController extends Controller
{
    public function index()
    {
        $Sexos = Sexo::all();
        $Grados = Grado::all();
        $Seccions = Seccion::all();
        $Turnos = Turno::all();
        $Usuarios = User::all();
        $Roles = Role::all();
        $Booleans = Boolean::all();
        $Deportes = Deporte::all();
        $Parentescos = Parentesco::all();
        $Socials = Social::all();
        $Trabajos = Trabajo::all();
        $Visions = Vision::all();
        $Alumnos = Alumno::all();
        $view_alumno_grado = view_alumno_grado::all();
        $view_alumno_visual = view_alumno_visual::all();
        $view_alumno_representante = view_alumno_representante::all();
        $view_alumno_amtropometria = view_alumno_amtropometria::all();
        $view_alumno_social_deporte = view_alumno_social_deporte::all();
      
        $result = [
            'Sexos' => $Sexos,
            'Grados' => $Grados,
            'Seccions' => $Seccions,
            'Turnos' => $Turnos,
            'Usuarios' => $Usuarios,
            'Roles' => $Roles,
            'Booleans' => $Booleans,
            'Deportes' => $Deportes,
            'Parentescos' => $Parentescos,
            'Socials' => $Socials,
            'Trabajos' => $Trabajos,
            'Visions' => $Visions,
            'Alumnos' => $Alumnos,
            'view_alumno_grado' => $view_alumno_grado,
            'view_alumno_visual' => $view_alumno_visual,
            'view_alumno_representante' => $view_alumno_representante,
            'view_alumno_amtropometria' => $view_alumno_amtropometria,
            'view_alumno_social_deporte' => $view_alumno_social_deporte,
        ];
        return $result;
    }
}

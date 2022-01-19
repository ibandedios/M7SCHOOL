<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class MateriasprController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            $email = $_COOKIE['iduser'];
            $materias = Registry::get('database')->selectAll('materias');
            $materiasProfesor = [];
            foreach ($materias as $materia){
                if($materia->profesor_id){
                    $materiasProfesor[] = $materia->nombre;
                    $cursoid = $materia->curso_id;
                    $alumnos = Registry::get('database')->selectAll('alumnos');
                    foreach($alumnos as $alumno){
                        if($alumno->curso_id = $cursoid ){
                            $materiasProfesor[] = $alumno->nombre;
                        }
                    }
                }
            }
            $materiasAl = implode(', ', $materiasProfesor);
            return view('materias', compact("materiasAl"));
            
        }
    }
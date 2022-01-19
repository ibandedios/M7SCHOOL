<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class MateriasController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            $email = $_COOKIE['iduser'];
            $idcurso = Registry::get('database')->obtenerCurso($email);
            $curso = $idcurso[0]->curso_id;
            $materia = Registry::get('database')->obtenerMaterias($curso);
            $contador = 0;
            $nomMateria = [];
            while($contador < sizeof($materia)){
                $nomMateria[] = $materia[$contador]->nombre;
                $contador++;
            }
            $materiasAl = implode(', ', $nomMateria);
            return view('materias', compact("materiasAl"));
            
        }
    }
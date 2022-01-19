<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class ManageController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            $materias = Registry::get('database')->selectAll('materias');
            $profesores = Registry::get('database')->selectAll('profesor');
            $alumnos = Registry::get('database')->selectAll('alumnos');
            $cursos = Registry::get('database')->selectAll('curso');
            
            return view('manage', compact('materias', 'profesores', 'alumnos', 'cursos'));
            
        }
    }
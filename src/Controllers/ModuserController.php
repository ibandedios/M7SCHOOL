<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class ModuserController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            $alumnos = Registry::get('database')->selectAll('alumnos');
            $profesores = Registry::get('database')->selectAll('profesor');

            return view('moduser', compact("alumnos", "profesores"));
            
        }
    }
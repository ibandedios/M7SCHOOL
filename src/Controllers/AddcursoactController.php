<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class AddcursoactController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            $curso=filter_input(INPUT_POST, 'curso');
            if($curso != "" && $curso != ""){
            Registry::get('database')->insertCurso($curso);
            $this->redirectTo('/dashboard');
            }
            else{
                $this->redirectTo("/addcurso");
            }
            
        }
    }

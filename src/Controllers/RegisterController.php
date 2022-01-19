<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class RegisterController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            $cursos = Registry::get('database')->selectAll('curso');
            
            return view('register', compact('cursos'));
            
        }
    }
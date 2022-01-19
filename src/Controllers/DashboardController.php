<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class DashboardController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            //$alumnos = Registry::get('database')->selectAll('alumnos');
            $tipo = $_COOKIE['tipo'];
            return view('dashboard',compact('tipo'));
            
        }
    }
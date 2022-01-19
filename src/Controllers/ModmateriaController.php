<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class ModmateriaController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            $materias = Registry::get('database')->selectAll('materias');

            return view('modmateria', compact("materias"));
            
        }
    }
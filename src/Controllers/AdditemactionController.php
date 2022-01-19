<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class AdditemactionController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            #$nomTarea = "";
            $nomTarea=filter_input(INPUT_POST, 'nomTarea');
            $nomItem=filter_input(INPUT_POST, 'nomItem');
            $email_user=$_COOKIE['iduser'];
            //intentar
            
            $idLista = Registry::get('database')->returnIDTarea($email_user, $nomTarea);
            $idListaSTR = $idLista[0]->id;
            $idListaSTR = intval($idListaSTR);
            Registry::get('database')->insertTaskitem($idListaSTR, $nomItem);
        
            //SELECT id FROM tarea WHERE email_user = 'iban@gmail.com' and nomTarea = 'M5';
            
            $this->redirectTo("tareas");
            //si hay algun error porque el email no se puede repetir en la base de datos,
            //se tiene que repetir el registro
            
        }
    }

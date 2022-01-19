<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class VistatiactController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            $nameTarea=filter_input(INPUT_POST, 'nameTarea');
            $email_user=$_COOKIE['iduser'];
            $idLista = Registry::get('database')->returnIDTarea($email_user, $nameTarea);
            $contador = 0;
            $idListaSTR = [];
            while($contador < sizeof($idLista)){
                $idListaSTR[] = $idLista[$contador]->id;
                $contador++;
            }
            $idListaSTR = intval($idListaSTR[0]);
            
        
            //el email actual compararlo al email de tareas junto con el id del return
            $listasEjer = Registry::get('database')->mostrarEjercicios($idListaSTR);
            $nombres = [];
            $i = 0;
            while ($i < sizeof($listasEjer)){
                $nombres[] = $listasEjer[$i]->nombreItem;
                $i++;
            }
            $strEjerc = implode(', ', $nombres);
            return view('vistati', compact('strEjerc'));
            
        }
    }
    

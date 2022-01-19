<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class RemtareaactController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            $remTarea=filter_input(INPUT_POST, 'remTarea');
            $email = $_COOKIE['iduser'];
            try{
                $id =  Registry::get('database')->returnIDTarea($email, $remTarea);
                var_dump($id);
                $idListaSTR = $id[0]->id;
                $idListaSTR = intval($idListaSTR);
                Registry::get('database')->eliminarTaskItem($idListaSTR);
                Registry::get('database')->eliminarTarea($remTarea);
                #$lista_tareas = mostrarTareas($gdb);
                #if($lista_tareas != NULL){
                #    $tareas = implode(',', $lista_tareas);
                #    setcookie("tareas", $tareas, 0, "/", "localhost");
                #}
                #else{
                #    setcookie("tareas", FALSE, 0, "/", "localhost");
                #}
                
                
                
                $this->redirectTo("tareas");
            }
            catch(PDOException $e){
                return view("remTareas");
            }
            
        }
    }

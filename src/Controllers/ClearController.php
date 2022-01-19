<?php

namespace App\Controllers;


use App\Controller;
use App\Registry;
use App\Request;
use App\Session;

class ClearController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

        public function index()
        {
            if (isset($_COOKIE['datosEmail'])){
                if($_COOKIE['datosEmail']!=NULL){
                   //te reemplaza los datos como FALSE
                   setcookie('datosEmail',FALSE,0,"/","localhost");
                   
                }
             }
       
                
       
       if (isset($_COOKIE['tareas'])){
          if($_COOKIE['tareas']!=NULL){
             //te reemplaza los datos como FALSE
             setcookie('tareas',FALSE,0,"/","localhost");
          }
       }

       if (isset($_COOKIE['tipo'])){
        if($_COOKIE['tipo']!=NULL){
           //te reemplaza los datos como FALSE
           setcookie('tipo',FALSE,0,"/","localhost");
        }
     }
            
            return view('index');
            
        }
    }
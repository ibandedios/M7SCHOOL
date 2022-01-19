<?php

    namespace App;

    use App\Request;
    use App\Session;

    class Controller{
        protected $request;
        protected $session;

        function __construct(Request $request, Session $session){
            $this->request=$request;
            $this->session=$session;
        }

        public function redirectTo($location){
            $location=root().$location;
            header('Location:'.$location);
        }
    }
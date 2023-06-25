<?php
   class DefaultController extends SecurityController {

    public function __construct()
    {
        parent::__construct();
      //  parent::isLoggedIn();
    }


        public function home(){
            // On a seulement de l'affichage on require la vue qui
            // correspond à notre page d'accueil
            require 'view/home.php';
        }
        public function notFound(){
            http_response_code(404);
            require 'view/errors/404.php';
        }

    }
?>

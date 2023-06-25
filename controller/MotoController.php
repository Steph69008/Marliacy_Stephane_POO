<?php
class MotoController extends SecurityController {
    private $mc;
    public static $allowedAttribut4=[
       "allowed1",
       "allowed2",
       "allowed3",
       "allowed4",
    ];


    public function __construct(){
        parent::__construct();
        
        $this->mc = new MotoManager();
    }

    public function displayAll(){
        $motos= $this->mc->getAll();

        require 'view/motos/list.php';
    }

    public function displayOne($id){
        $moto= $this->mc->getOne($id);

        if(is_null($moto)){
            header("Location: index.php?controller=default&action=not-found&scope=moto");
        }

        require 'view/motos/detail.php';
    }
    public function add(){
        parent::isLoggedIn();
        $errors = [];

        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            // Vérifier mon formulaire
            $errors = $this->checkForm();
            if(empty($_POST["brand"])){
                $errors["brand"] = "Veuillez saisir le nom de l'objet";
            }

            if(strlen($_POST["brand"])>250){
                $errors["brand"] = "Le nom de l'objet est trop long (250 caractères maximum)";
            }
            
            if(empty($_POST["model"])){
                $errors["model"] = "Veuillez saisir l'attribut3 de la l'objet";
            }

            if(strlen($_POST["model"])<20){
                $errors["model"] = "L'attribut3 est trop court (20 caractères minimum)";
            }

            if(!in_array($_POST["type"], self::$allowedAttribut4)){
                $errors["type"] = "Ce type d'attribut4 n'existe pas";
            }

            if(strlen($_POST["picture"])>250){
                $errors["picture"] = "Veuillez entrer un lien plus court";
            }

            if(count($errors) == 0){
                $moto = new Moto(null, $_POST["brand"],
                    $_POST["model"], $_POST["id_moto_type"], $_POST["picture"]);
                $this->mc->add($moto);
                header("Location:index.php?controller=moto&action=list");
            }
            // Si il est valide je vais enregistrer mes données puis rediriger l'utilisateur
        }

        require "view/motos/form_add.php";
    }
    private function checkForm(){
        $errors = [];
        if(empty($_POST["brand"])){
            $errors["brand"] = "Veuillez saisir le nom de l'objet";
        }

        if(strlen($_POST["brand"])>250){
            $errors["brand"] = "Le nom de l'objet est trop long (250 caractères maximum)";
        }
        
        if(empty($_POST["model"])){
            $errors["model"] = "Veuillez saisir l'attribut3 de la l'objet";
        }

        if(strlen($_POST["model"])<250){
            $errors["model"] = "L'attribut3 est trop court (250 caractères minimum)";
        }

        if(!in_array($_POST["type"], self::$allowedAttribut4)){
            $errors["type"] = "Ce type d'attribut4 n'existe pas";
        }

        if(strlen($_POST["picture"])>250){
            $errors["picture"] = "Veuillez entrer un lien plus court";
        }

        return $errors;
    }

        public function delete($id){
            parent::isLoggedIn();
            $moto= $this->mc->getOne($id);

            if(is_null($moto)){
                header('Location: index.php?controller=default&action=not-found&scope=moto');
            } else {
                $this->mc->delete($moto->getId());
                header("Location: index.php?controller=moto&action=list");
            }
        }
    public function displayBytype($type)
    {
        $motos=$this->mm->getByType($type);

        require 'view/motos/list_type.php';
    }
}



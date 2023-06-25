<?php
require 'autoload.php';
session_start();

// ICI : On redirige l'utilisateur avec des paramètres permettant
// D'afficher la page d'accueil
if (
    !array_key_exists("controller", $_GET) &&
    !array_key_exists("action", $_GET)
) {
    header('Location:index.php?controller=default&action=home');
}

// Si le paramètre GET de notre url est égal à défault
// On cré un nouver objet DefaultController
if ($_GET["controller"] == "default") {
    $controller = new DefaultController();
    // Si le paramètre get est égal à home
    if ($_GET["action"] == "home") {
        // On renvoie vers la mèthode home de notre controller
        // DefaultController
        $controller->home();
    }
    if($_GET["action"]== 'not-found'){
        $controller->notFound();
    }

}

if($_GET["controller"] == 'security'){
    $controller = new SecurityController();
    if($_GET["action"] == 'register'){
        $controller->register();
    }

    if($_GET["action"] == 'login'){
        $controller->login();
    }

    if($_GET["action"] == 'logout'){
        $controller->logout();
    }
    if($_GET["action"] == 'listtype'){
        $controller->getMotosByType($typeId);
    }
}

if ($_GET["controller"] == "moto") {
    $controller = new MotoController();
    if ($_GET["action"] == "list") {
        $controller->displayAll();
    }
    if ($_GET["action"] == "list_type" && array_key_exists('type', $_GET)) {
        $controller->displayBytype($_GET["type"]);
    }
    if($_GET['action'] == 'detail' && array_key_exists( 'id', $_GET)) {
        $controller = $controller->displayOne($_GET["id"]);
    }
    if($_GET["action"] == 'add'){
        $controller->add();
    }
    if($_GET["action"] == "delete" && array_key_exists("id", $_GET)){
        $controller->delete($_GET["id"]);
    }
}

?>
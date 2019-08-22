<?php

require_once 'Models/Conexion.php';

$controller = 'Login';

/*Carga la pagina de inicio cuando no se llama ningun controlador en este caso el login*/ 
if(!isset($_REQUEST['c'])){
    require_once "Controllers/{$controller}Controller.php";
  //  $controller = ucwords($controller)
    $controller = new $controller;
    $controller->index();
}else{
    /**Buscamos un controlador*/
    $controller = ucwords($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? ucwords($_REQUEST['a']) : 'Index';

    /**Instaciamos el controlador */
    
    require_once "Controllers/{$controller}Controller.php";
    require_once "Models/{$controller}Model.php";
    require_once "Models/{$controller}.php";

    $controller = ucwords($controller).'Controller';
    $controller = new $controller();

    call_user_func( array($controller,$accion) );
    
}







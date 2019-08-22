<?php

class ClienteController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new ClienteModel();
    }

    public function Index(){
   
        require_once 'Views/header.php';
        require_once 'Views/Cliente/index.php';
        require_once 'Views/footer.php';
    }

    public function detalle(){

        $alm = new Persona();
        
        if(isset($_REQUEST['idpersona'])){
            $alm = $this->model->getting($_REQUEST['idpersona']);
        }
        

        require_once 'Views/header.php';
        require_once 'Views/Cliente/detalle.php';
        require_once 'Views/footer.php';
    }

    public function ViewCreate(){

        
        $cliente = new Cliente();

        if(isset($_REQUEST['id'])){

            $id  =  (int) $_REQUEST['id'];
           
            $cliente = $this->model->Getid($id);

        }else{
            $cliente->setIdPersona(0);
        }


        require_once 'Views/header.php';
        require_once 'Views/Cliente/NewOrEdit.php';
        require_once 'Views/footer.php';
    }

    public function NewOrEdit(){


        $cliente = new Cliente();

        $cliente->setIdPersona($_POST['idpersona']);
        $cliente->setNombre($_POST['nombre']);
        $cliente->setApellido($_POST['apellido']);
        $cliente->setNacimiento($_POST['nacimiento']);
       

        $cliente->getIdPersona() > 0 
        ? $this->model->Update($cliente)
        : $this->model->Create($cliente);
    
         header('Location: ?c=Cliente&a=index');

    }

    public function Delete(){
        $this->model->Delete($_REQUEST['id']);
        //echo json_encode($datos, JSON_FORCE_OBJECT);

        header('Location: ?c=Cliente&a=index');

    }

}
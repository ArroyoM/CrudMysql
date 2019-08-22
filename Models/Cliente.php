<?php

class Cliente{

    private $idpersona;
    private $nombre;
    private $apellido;
    private $nacimiento;


    public function getIdPersona(){
        return $this->idpersona;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function getNacimiento(){
        return $this->nacimiento;
    }

    public function setIdPersona($id){
        $this->idpersona = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }   

    public function setNacimiento($nacimiento){
        $this->nacimiento = $nacimiento;
    }

}

?>
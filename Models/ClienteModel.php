<?php

class ClienteModel{

    private $conn;
    
    public function __CONSTRUCT(){

        try{
        
            $conexion = new Conexion();
            $this->conn = $conexion->getDB();

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function AllClientes(){
    
        try{
        
            $result = array();

            $stm = $this->conn->prepare("SELECT * FROM CLIENTE WHERE ESTADO = 0");

            $stm->execute();

            foreach( $stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $clientes = new Cliente();

                $clientes->setIdPersona($r->idpersona);
                $clientes->setNombre($r->nombre);
                $clientes->setApellido($r->apellido);
                $clientes->setNacimiento($r->fecha);

                $result[] = $clientes;
            }

            return $result;
        }catch(Excepetion $e){
            die($e->getMessage());
        }
    }

    public function Getid($id){

        try{

            $stm = $this->conn->prepare("SELECT * FROM CLIENTE WHERE idpersona= ? ");

            $stm->execute(
                array($id)
            );

            $cliente = new Cliente();
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $cliente->setIdPersona($r->idpersona);
            $cliente->setNombre($r->nombre);
            $cliente->setApellido($r->apellido);
            $cliente->setNacimiento($r->fecha);



            return $cliente;
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Delete($id){

        try{

            $this->conn->beginTransaction();

            $stm = $this->conn->prepare("UPDATE CLIENTE SET ESTADO = 1 WHERE idpersona = ? ");

            $stm->execute(
                array($id)
            );

            $this->conn->commit();
            $afectadas = $stm->rowCount();

            return $afectadas;

        }catch(Excepetion $e){
            $this->conn->rollBack();
            die($e->getMessage());

        }
    }

    public function Update($persona){

        try{

            $this->conn->beginTransaction();

            $stm = $this->conn->prepare("UPDATE CLIENTE SET NOMBRE = ?, APELLIDO = ?, FECHA = ? WHERE IDPERSONA = ?");

            $stm->execute(
                array(
                $persona->getNombre(),
                $persona->getApellido(),
                $persona->getNacimiento(),
                $persona->getIdpersona()
            ));
            $this->conn->commit();
            $afectadas = $stm->rowCount();
   
            return $afectadas;

        }catch(Excepetion $e){
            $this->conn->rollBack();
            die($e->getMessage());
        }
    }

    public function Create($cliente){

        try{

            $this->conn->beginTransaction();

            $stm = $this->conn->prepare("INSERT INTO CLIENTE(NOMBRE, APELLIDO, FECHA) VALUES(?,?,?)");

            $stm->execute(
                array(
                    $cliente->getNombre(),
                    $cliente->getApellido(),
                    $cliente->getNacimiento()
                )
            );

            $this->conn->commit();
            $afectadas = $stm->rowCount();

            return $afectadas;
        }catch(Exception $e){
            $this->conn->rollBack();
            die($e->getMessage());
        }
    }

}
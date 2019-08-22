<?php
class Conexion
{
    private $pdo;

    public function __CONSTRUCT(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=dbcrud;charset=utf8','root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	   
    }


    public function getDB() {
        if ($this->pdo instanceof PDO) {
             return $this->pdo;
        }
  }
}
?>



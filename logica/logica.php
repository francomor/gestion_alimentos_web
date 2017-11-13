<?php
include("../persistencia/conexionBD.php");

ini_set('display_errors', 'On');
error_reporting(E_ALL);

class rubro{
    private $id;
    private $nombre;
    //public Establecimiento m_Establecimiento;

    public function getId() {
        return $id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function  getNombre() {
        return $nombre;
    }

    public function  setNombre($nombre) {
        $this->nombre = $nombre;
    }

   /* public function  getM_Establecimiento() {
        return m_Establecimiento;
    }

    public function  setM_Establecimiento(Establecimiento m_Establecimiento) {
        this.m_Establecimiento = m_Establecimiento;
    }*/
     public function existe(){
        $con = ConexionBD::getConexion();
        $result=$con->existe("select nombre from rubro where nombre='rubro5'");
        return $result;
    }
    
    public function insertar(){
        $con = ConexionBD::getConexion();
        $con->insertar("INSERT INTO `rubro`(`id`, `nombre`) VALUES (default,'rubro5')");
    }
    
        public function recuperarNombre(){
        
        $con = ConexionBD::getConexion();
        //$con->recuperar("select nombre from rubro");
        $result = $con->recuperar("select nombre from rubro");
        return $result;
    }
}
?>
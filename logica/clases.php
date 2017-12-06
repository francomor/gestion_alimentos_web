<?php

include_once("../persistencia/conexionBD.php");
error_reporting(E_ALL ^ E_NOTICE);

class Rubro {

    private $id;
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
        $this->id = $this->recuperarID($nombre);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function existe($nombre) {
        $con = ConexionBD::getConexion();
        $result = $con->existe("select nombre from rubro where nombre='" . $nombre . "'");
        return $result;
    }

    public function insertar($nombre) {
        $con = ConexionBD::getConexion();
        $con->insertar("INSERT INTO `rubro`(`id`, `nombre`) VALUES (default,'" . $nombre . "')");
    }

    public function recuperarNombre() {

        $con = ConexionBD::getConexion();
        $result = $con->recuperar1("select nombre from rubro");
        return $result;
    }

    public function cant_registros() {
        $con = ConexionBD::getConexion();
        $result = $con->cantidad_registros("select nombre from rubro");
        return $result;
    }

    public function recuperarID($nombre) {

        $con = ConexionBD::getConexion();
        $result = $con->recuperar("select id from rubro where nombre='" . $nombre . "'");
        return $result[0][0];
    }

}

class Establecimiento {

    private $id;
    private $categoria;
    private $direccion;
    private $fechaDeCarga;
    private $nombre;
    private $telefono;
    private $nro_factura;
    private $CUIT_Empresa;
    private $id_Categoria;
    private $id_Localidad;
    private $rne;
    private $rubro = array();

    public function addRubro(Rubro $rubro) {
        $this->rubro[] = $rubro;
    }

    public function getRubros() {
        return $this->rubro;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getFechaDeCarga() {
        return $this->fechaDeCarga;
    }

    public function setFechaDeCarga() {
        date_default_timezone_set('UTC');
        $fecha = date("Y") . "-" . date("m") . "-" . date("d");
        $this->fechaDeCarga = $fecha;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getCUIT_Empresa() {
        return $this->CUIT_Empresa;
    }

    public function setCUIT_Empresa($CUIT_Empresa) {
        $this->CUIT_Empresa = $CUIT_Empresa;
    }

    public function getId_Categoria() {
        return $this->id_Categoria;
    }

    public function setId_Categoria($id_Categoria) {
        $this->id_Categoria = $id_Categoria;
    }

    public function getId_Localidad() {
        return $this->id_Localidad;
    }

    public function setId_Localidad($id_Localidad) {
        $this->id_Localidad = $id_Localidad;
    }

    public function getNro_factura() {
        return $this->nro_factura;
    }

    public function setNro_factura($nro_factura) {
        $this->nro_factura = $nro_factura;
    }

    public function getRne() {
        return $this->rne;
    }

    public function setRne(RNE $rne) {
        $this->rne = $rne;
    }

    public function __construct() {
        
    }

    public function existe($rne) {
        $con = ConexionBD::getConexion();
        $result = $con->existe("select nombre from establecimiento where nro_rne=" . $rne);
        return $result;
    }

    public function get_Id_Categoria($categoria) {
        $con = ConexionBD::getConexion();
        $result = $con->recuperar("select id from categoria where nombre='" . $categoria . "'");
        return $result;
    }

    public function guardar($est) {
        $con = ConexionBD::getConexion();

        $consulta = "        INSERT
INTO
    `establecimiento`(
        `id`,
        `direccion`,
        `fecha_carga`,
        `nombre`,
        `telefono`,
        `nro_RNE`,
        `vencimiento_RNE`,
        `nro_factura`,
        `Empresa_CUIT`,
        `Localidad_id`,
        `Categoria_id`
    )
VALUES(
    DEFAULT,
    '" . $est->getDireccion() . "',
    '" . $est->getFechaDeCarga() . "',
    '" . $est->getNombre() . "',
    '" . $est->getTelefono() . "',
    '" . $est->getRne()->getNumero() . "',
    '" . $est->getRne()->getFecha_vencimiento() . "',
    '" . $est->getNro_Factura() . "',
    " . $est->getCUIT_empresa() . ",
    " . $est->getId_Localidad() . ",
    " . $est->getId_Categoria() . "
)";
        $result = $con->insertar($consulta);
        return $result;
    }

    public function establecimientoXrubro($rub, $id) {
        $con = ConexionBD::getConexion();

        for ($i = 0; $i < count($rub); $i++) {
            $con->insertar("INSERT INTO `establecimiento_has_rubro`(`Establecimiento_id`, `Rubro_id`) VALUES (" . $id . "," . $rub[$i]->getId() . ")");
        }
    }

    public function obtenerUltimoId() {
        $con = ConexionBD::getConexion();
        $result = $con->recuperar("SELECT MAX(id) AS id FROM establecimiento");
        return $result[0][0];
    }

    public function obtenerCantidadPorAño() {
        $con = ConexionBD::getConexion();
        $consulta= "select year(fecha_carga) as año, count(establecimiento.id) as cantidad
                    from establecimiento
                    group by año
                    order by año asc";

        $result = $con->recuperar1($consulta);
        return $result;
    }


}

//end establecimiento

class RNE {

    private $fecha_vencimiento;
    private $numero;
    public $m_Establecimiento;

    public function __construct($numero, $fecha_vencimiento) {
        $this->numero = $numero;
        $this->fecha_vencimiento = $fecha_vencimiento;
    }

    public function getFecha_vencimiento() {
        return $this->fecha_vencimiento;
    }

    public function setFecha_vencimiento($fecha) {
        $this->fecha_vencimiento = $fecha;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero(int $numero) {
        $this->numero = $numero;
    }

}

//end RNE

class Localidad {

    private $id;
    private $nombre;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {

        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {

        $this->nombre = $nombre;
    }

    public function obtener_Id_Localidad($localidad) {
        $con = ConexionBD::getConexion();
        $result = $con->recuperar("select id from localidad where nombre='" . $localidad . "'");
        return $result[0][0];
    }

}

//end localidad


class Producto_alimenticio {
    
        public function obtenerCantidadPorAño() {
            $con = ConexionBD::getConexion();
            $consulta= "select year(fecha_carga_solicitud) as año, count(producto_alimenticio.id) as cantidad
                        from producto_alimenticio
                        group by año
                        order by año asc";
    
            $result = $con->recuperar1($consulta);
            return $result;
        }
    }

//end Producto_alimenticio
?>
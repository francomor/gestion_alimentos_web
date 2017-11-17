<?php
include("../persistencia/conexionBD.php");
ini_set('display_errors', 'On');
error_reporting(E_ALL);

class Rubro{
    private $id;
    private $nombre;
    //public Establecimiento m_Establecimiento;

    
    public function __construct($nombre) {
        $this->nombre=$nombre;
        //var_dump($this->recuperarID($nombre)[2][0]);
        //var_dump($this->recuperarID($nombre));
//        $this->id=$this->recuperarID($nombre)[0]["id"];
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function  getNombre() {
        return $this->nombre;
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
     public function existe($nombre){
        $con = ConexionBD::getConexion();
        $result=$con->existe("select nombre from rubro where nombre='".$nombre."'");
        return $result;
    }
    
    public function insertar($nombre){
        $con = ConexionBD::getConexion();
        $con->insertar("INSERT INTO `rubro`(`id`, `nombre`) VALUES (default,'".$nombre."')");
    }
    
        public function recuperarNombre(){
        
        $con = ConexionBD::getConexion();
        $result = $con->recuperar1("select nombre from rubro");
        //$con->cerrarConexion();
        return $result;
    }
    
        public function recuperarID($nombre){
        
        $con = ConexionBD::getConexion();
        $result = $con->recuperar1("select id from rubro where nombre='".$nombre."'");
        //$con->cerrarConexion();
        return $result;
    }
}

class Establecimiento{
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
    private $rubro=array();
    private $m_Empresa;
    

    public function addRubro(Rubro $rubro)
    {
        $this->rubro[] = $rubro;
    }
      public function getRubros()
    {
        return $this->rubro;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }


    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
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
        $fecha=date("Y") . "-" . date("m") . "-" . date("d");  
        $this->fechaDeCarga=$fecha;
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

   
   /* public Empresa getM_Empresa() throws SQLException, InstantiationException, IllegalAccessException {
       return Empresa.recuperarPorCuit(String.valueOf(CUIT_Empresa));
    }

    public void setM_Empresa(Empresa m_Empresa) {
        this.m_Empresa = m_Empresa;
    }*/


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

    public function setRne(RNE $rne)
    {
        $this->rne = $rne;
    }
    
       
    public function __construct(){
        
    }
     public function existe($id){
        $con = ConexionBD::getConexion();
        $result=$con->existe("select nombre from establecimiento where nombre=''");
        return $result;
    }
    
    public function insertar(){
        $con = ConexionBD::getConexion();
        $con->insertar("INSERT INTO `rubro`(`id`, `nombre`) VALUES (default,'rubro5')");
    }
    
        public function recuperarNombre(){
        
        $con = ConexionBD::getConexion();
        $result = $con->recuperar("select nombre from rubro");
        return $result;
    }
    
    public function get_Id_Categoria($categoria){
        $con = ConexionBD::getConexion();
        $result = $con->recuperar("select id from categoria where nombre='".$categoria."'");
        return $result;
    }
    
    
    public function guardar($est){
        $con = ConexionBD::getConexion();
        
        $consulta="        INSERT
INTO
    `establecimiento`(
        `id`,
        `direccion`,
        `fecha_carga`,
        `nombre`,
        `telefono`,
        `archivos_adjuntos`,
        `nro_RNE`,
        `vencimiento_RNE`,
        `nro_factura`,
        `Empresa_CUIT`,
        `Localidad_id`,
        `Categoria_id`
    )
VALUES(
    DEFAULT,
    '".$est->getDireccion()."',
    '".$est->getFechaDeCarga()."',
    '".$est->getNombre()."',
    ".$est->getTelefono().",
    'archivo_adj',
    '".$est->getRne()->getNumero()."',
    '".$est->getRne()->getFecha_vencimiento()."',
    ".$est->getNro_Factura().",
    ".$est->getCUIT_empresa().",
    ".$est->getId_Localidad().",
    ".$est->getId_Categoria()."
)";
$result = $con->insertar($consulta);
        return $result;
       }
       
       public function establecimientoXrubro($rub,$id){
           $con = ConexionBD::getConexion();
           
           for($i=0 ; $i < count($rub) ; $i++)
           {
                $con->insertar("INSERT INTO `establecimiento_has_rubro`(`Establecimiento_id`, `Rubro_id`) VALUES (".$id.",".$rub[$i]->getId().")");
            }
       }
       public function obtenerUltimoId(){
            $con = ConexionBD::getConexion();
            $result = $con->recuperar("SELECT MAX(id) AS id FROM establecimiento");
            return $result[0][0];
       }
}

class RNE {

    private $fecha_vencimiento;
    private $numero;
    public $m_Establecimiento;


    public function __construct($numero,$fecha_vencimiento){
      $this->numero=$numero;
      $this->fecha_vencimiento=$fecha_vencimiento;
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

    /*public function getM_Establecimiento() {
        return m_Establecimiento;
    }

    public function setM_Establecimiento(Establecimiento m_Establecimiento) {
        this.m_Establecimiento = m_Establecimiento;
    }*/

}//end RNE

class Localidad {

    private $id;
    private $nombre;
    //private Provincia provincia;


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
    
    public function obtener_Id_Localidad($localidad){
        $con = ConexionBD::getConexion();
        $result = $con->recuperar("select id from localidad where nombre='".$localidad."'");
        return $result;
    }

    //public Provincia getProvincia() {
    //    return provincia;
    //}

    //public void setProvincia(Provincia provincia) {
    //    this.provincia = provincia;
    //}

}//end localidad

class Provincia{
    private $id;
    private $nombre;


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}//end provincia

if (isset($_POST['submit'])){
$est=new Establecimiento();
$loc = new Localidad();
$localidad=$loc->obtener_Id_localidad($_POST['localidad']);
$est->setId_Localidad(implode($localidad[0]));
$cat=$est->get_Id_Categoria($_POST['categoria']);
$est->setId_Categoria(implode($cat[0]));
$est->setCUIT_Empresa($_POST['cuit']);
$est->setNombre($_POST['nombre']);
$est->setDireccion($_POST['domicilio']);
$est->setNro_factura($_POST['nro_factura']);
$est->setTelefono($_POST['telefono']);
$est->setRne(new RNE($_POST['rne'],$_POST['venc']));
$est->setFechaDeCarga();


//var_dump($est);
//$est->addRubro(new Rubro("panadería"));
//$est->addRubro(new Rubro("Carnes"));
//$rub=$est->getRubros();
//$rub[0]->getId();
//$rub[1]->getId();


$est->guardar($est);

//$est->establecimientoXrubro($est->getRubros(),$est->obtenerUltimoId());


/*
print("direccion");
print("<br>");
var_dump($est->getDireccion());print("<br>");
print("fecha de carga");print("<br>");
var_dump($est->getFechaDeCarga());print("<br>");
print("nombre");print("<br>");
var_dump($est->getNombre());print("<br>");
print("telefono");print("<br>");
var_dump($est->getTelefono());print("<br>");
print("rne");print("<br>");
var_dump($est->getRne()->getNumero());print("<br>");
print("venc");print("<br>");
var_dump($est->getRne()->getFecha_vencimiento());print("<br>");
print("fac");print("<br>");
var_dump($est->getNro_Factura());print("<br>");
print("cuit");print("<br>");
var_dump($est->getCUIT_empresa());print("<br>");
print("localidad");print("<br>");
var_dump($est->getId_Localidad());print("<br>");
print("cat");print("<br>");
var_dump($est->getId_Categoria());print("<br>");
*/





/*$rub=new Rubro("a");
$result=$rub->recuperarNombre();
$result1=$rub->recuperarID("panaderia");
$result2=$rub->recuperarNombre();
$result3=$rub->recuperarID("carnes");

var_dump($result);print("result <br>");print("<br>");
var_dump($result1);print(" result 1<br>");print("<br>");
var_dump($result2);print("result 2 <br>");print("<br>");
var_dump($result3);print("result 3<br>");print("<br>");
*/
/*
print($rub[0]->getNombre());
print($rub[0]->getId());
print($rub[1]->getId());
*/

}


//ajax para cargar los datos de la empresa.

session_start();
extract($_REQUEST);
$cuit=$_REQUEST['cuit'];  
if($cuit != null){
 
         $con = ConexionBD::getConexion();
        $result=$con->existe("select nombre from empresa where cuit=".$cuit);
 if($result)  
 {   
   $result1=$con->recuperar("select * from empresa where cuit=".$cuit); 
                 print ("<TABLE>\n");
                print ("<TR>\n");
                print ("<TH>cuit</TH>\n");
                print ("<TH>email</TH>\n");
                print ("<TH>razon social</TH>\n");
                print ("<TH>telefono</TH>\n");
                print ("<TH>localidad</TH>\n");
                print ("</TR>\n");
            print ("<TR>\n");
            print ("<TD>" . $result1[0][0] . "</TD>\n");
            print ("<TD>" . $result1[0][1] . "</TD>\n");
            print ("<TD>" . $result1[0][2] . "</TD>\n");
            print ("<TD>" . $result1[0][3] . "</TD>\n");
            print ("<TD>" . $result1[0][4] . "</TD>\n");
            print ("</TR>\n");

         print ("</TABLE>\n"); 
 }
 else  
 {    
   echo "no existe";  
 }  
}
 
 

?>
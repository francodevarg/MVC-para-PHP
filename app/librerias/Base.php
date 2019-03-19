<?php

/*
* La clae Base conecta a una database
* Debe: * ejecutar consulta.
*       * obtener un registro.
*       * obtener varios registros.
*       * modificar un registro por id.
*/

class Base {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pwd = DB_PWD;
    private $name = DB_NAME;
    
    protected $dbh; //Objeto PDO manejador(handler)
    protected $stmt;
    protected $error;


    public function __construct()
    {
        
        //configurar conexion
        $dns = 'mysql:host='.$this->host.';dbname='.$this->name;
        $opciones = array(
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    );

        self::generarConexion($dns , $opciones);
    }
     
    /*
    * Pre: un dns con sus datos bien configurados desde app/config 
    * Post Instancia un objeto PDO.
    */
    private function generarConexion($dns, $opciones)
    {
        
        try
        {
            $this->dbh = new PDO($dns,$this->user,$this->pwd,$opciones);
            //Conectarnos con caracteres españoles.
            $this->dbh->exec('SET NAMES UTF8');
        } 
        catch (PDOException $ex) 
        {
            $this->error = $ex->getMessage();
            //echo this->error;
            var_dump("Che, ,no anda");
            //header("Location: http://localhost/oop/proyecto/conexion/base.php");
            //exit;
        }
    }
}
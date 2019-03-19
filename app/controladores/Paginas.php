<?php

/*Todo controlador debe tener un index().*/

/**
 * El controlador Paginas hereda de Controlador vista() y modelo().
*/

class Paginas extends Controlador{


    public function __construct(){
        //echo 'Controlador paginas cargando';
        
    }

    public function index(){
        $datos = [
            'titulo' => 'Bienvenido a fran'

        ];
        //Este metodo me lleva a la ruta y le paso datos
        $this->vista('paginas/inicio', $datos);
    }

    public function articulo(){
        //$this->vista('paginas/articulo');
    }

    public function actualizar($id){
        echo $id;
    }

}//fin de Paginas.


?>
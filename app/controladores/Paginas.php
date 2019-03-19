<?php

/*Todo controlador debe tener un index.*/ 


class Paginas extends Controlador{


    public function __construct(){
        //echo 'Controlador paginas cargando';
        
    }

    public function index(){
        $datos = [
            'titulo' => 'Bienvenido a fran'

        ];
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
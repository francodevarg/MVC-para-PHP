<?php


//Clase controlador principal
//Se encarga de poder cargar los modelos y las vistas.


class Controlador{
    
    
    //cargar Modelo
    public function modelo($modelo)
    {
        //carga
        require_once '../app/modelos/'.$modelo.'.php';

        //instanciar el modelo.
        return new $modelo();

    }


    //cargar vista
    public function vista($vista ,$datos = [])
    {   
        //chequear si el archivo vista existe.         
        if( file_exists('../app/vistas/'.$vista.'.php') ){
            
            //carga
            require_once '../app/vistas/'.$vista.'.php';

        }
        else
        {
            //si el archivo de la vista no existe.
            die("La vista no existe");

        }
    
    }


}//fin de la clase Controlador.


?>
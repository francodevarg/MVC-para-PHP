<?php

/* 


La clase Core trae la URL ingresada en el navegador , (la mappea)
Trae tres cosas
  1-controlador.
  2-método.
  3-Parámetros.
  Ejemplo: articulos/modificar/4 */
  /* mientras no se cargue algo , carga algo por
  defecto
  Cuando ingresas algo en la url, lo primero que llama
  es al controlador de la carpeta controladores, gracias 
  al callback call_user_func_array.

  */
    class Core 
    {

        //Atributos
        protected $controladorActual = 'paginas';
        protected $metodoActual = 'index';
        protected $parametros = [];


        //Metodos

        //Constructor.
        public function __construct()
        {
            //print_r($this->getUrl());
            
            $url = $this->getUrl();
            
            //CHEQUEAR LA PRIMERA PARTE DE LA URL (Controlador)

            //controlador a buscar
            $controlador = ucwords($url[0]);

            //Buscar en controladores si el controlador existe
            if (file_exists('../app/controladores/'.$controlador.'.php')) 
            {
                //si existe se setea como controlador por defecto
                $this->controladorActual = $controlador;
                //unset indice
                unset($url[0]);
            } 

            
            //requerir el controlador.
            require_once "../app/controladores/". $this->controladorActual . '.php';
        
            $this->controladorActual = new $this->controladorActual;


            //CHEQUEAR LA SEGUNDA PARTE DE LA URL (Metodo)

            if (isset($url[1])){
                if (method_exists($this->controladorActual, $url[1])) {
                    //chequeamos el método
                    $this->metodoActual = $url[1];
                    unset($url[1]);
                }
            }

            //para probar traer metodo
            //echo $this->metodoActual;

            //CHEQUEAR LA TERCERA PARTE DE LA URL (Vista)
            $this->parametros = $url ? array_values($url): [];


            //llamar callback con parametros array.
            //va a la carpeta controladores: busca el controlador.php ejemplo Paginas.php
            //luego el metodo y sus parametros.
            call_user_func_array([$this->controladorActual, $this->metodoActual],$this->parametros);



        }//fin del constructor


        public function getUrl()
        {
           // echo $_GET['url']; // atributo url del comodin htaccess
           
           if (isset($_GET['url']))
           {
               $url = rtrim( $_GET['url'] , '/');
               $url = filter_var($url, FILTER_SANITIZE_URL);
               $url = explode('/', $url);
               return $url;
            }

        }//fin del metodo getURL.
    
    }//fin de la clase Core.



?>

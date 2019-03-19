<?php

/*
* Métodos magicos __get y __set para las clases
*/

class Entitie 
{
    public function __get($name) {
	try {
	    $metodo = sprintf('get%s', ucwords($name));
	    if (!method_exists($this, $metodo)) {
		throw new BadMethodCallException("El método $metodo no existe");
	    }
	    return $this->$metodo();
	} catch (Exception $ex) {
	    echo $ex->getMessage();
	}
    }
    
    
    public function __set($name, $value) {
	try {
	    $metodo = sprintf('set%s', ucwords($name));
	    if (!method_exists($this, $metodo)) {
		throw new BadMethodCallException("El método $metodo no existe");
	    }
	    return $this->$metodo($value);
	} catch (Exception $ex) {
	    echo $ex->getMessage();
	}
    }
}

?>
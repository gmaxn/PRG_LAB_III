<?php

    // la funcion var_dump() nos sirve para inspeccionar variables 
    // pasadas por el cliente, nos permite resolver errores 
    // desglosar los objetos recibidos y ver las incompatibilidades 
    // entre objetos.


    $arrIndexado = array("Volvo", "BMW", "Toyota");
    echo "Array Indexado:<br>";
    var_dump($arrIndexado);
    echo "<br><br>";


    $arrAsociativo = array("nombre"=>"maxi", "edad"=>"28");
    echo "Array Asociativo:<br>";
    var_dump($arrAsociativo);
    echo "<br><br>";


    $nombre="Maxi";
    echo "Variable String:<br>";
    var_dump($nombre);
    echo "<br><br>";


    $miObj = new stdClass();
    $miObj->nombre="maxi";
    $miObj->edad=28;
    $miObj->dni="35340965";
    echo "objeto stdClass():<br>"; 
    var_dump($miObj);
    echo "<br><br>";


    $miClase = new Persona("Peter", "Parker", 29);
    echo "clase 'Persona':<br>";
    var_dump($miClase);
    echo "<br><br>";


    class Persona
    {
        public $nombre;
        public $apellido;
        public $edad;

        public function __construct($nombre, $apellido, $edad) 
        {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->edad = $edad;        
        }

        function retornarJSON()
        {
            return json_encode($this);
        }
    }
?>
<?php
    require_once("humano.php");

    class Persona extends Humano
    {
        public $dni;

        public function __construct($nombre, $apellido, $edad, $dni) 
        {
            parent::__construct($nombre, $apellido, $edad);
            $this->dni = $dni;        
        }

        function retornarJSON()
        {
            return json_encode($this);
        }
    }
?>
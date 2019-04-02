<?php
    include("humano.php");

    class Persona extends Humano
    {
        public $dni;

        public function __construct($nombre, $edad, $dni) 
        {
            parent::__construct($nombre, $edad);
            $this->dni = $dni;        
        }

        function retornarJSON()
        {
            return json_encode($this);
        }
    }
?>
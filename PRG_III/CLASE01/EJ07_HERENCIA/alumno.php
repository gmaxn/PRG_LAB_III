<?php
    include("persona.php");

    class Alumno extends Persona
    {
        protected $legajo;

        public function __construct($nombre, $edad, $dni, $legajo) 
        {
            parent::__construct($nombre, $edad, $dni);
            $this->legajo = $legajo;        
        }

        function retornarJSON()
        {
            return json_encode($this);
        }
        
    }
?>
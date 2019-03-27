<?php
    class Alumno extends Persona
    {
        public $legajo;


        // parametros opcionales "$id=false" 
        // para evitar constructores multiples
        public function __construct($name, $age, $id=false) 
        {
            $this->nombre = $name;
            $this->edad = $age;
            $this->dni = $id;        
        }

        function retornarJSON()
        {
            return json_encode($this);
        }
    }
?>
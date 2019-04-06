<?php

    class Humano
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
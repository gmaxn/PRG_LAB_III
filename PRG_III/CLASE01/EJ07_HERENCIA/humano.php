<?php
    class Humano
    {
        protected $nombre;
        protected $edad;

        public function __construct($nombre, $edad) 
        {
            $this->nombre = $nombre;
            $this->edad = $edad;
        }
        
        function retornarJSON()
        {
            return json_encode($this);
        }    
    }
?>
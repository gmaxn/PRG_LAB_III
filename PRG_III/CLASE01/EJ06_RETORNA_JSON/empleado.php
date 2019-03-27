<?php 
    class Empleado
    {
        public $nombre;
        public $edad;
        public $dni; 

        // parametros opcionales "$id=false" 
        // para evitar constructores multiples
        public function __construct($nombre, $edad, $dni=false) 
        {
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->dni = $dni;        
        }

        function retornarJSON()
        {
            return json_encode($this);
        }
    }
?>
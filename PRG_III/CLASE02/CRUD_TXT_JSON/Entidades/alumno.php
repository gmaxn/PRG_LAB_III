<?php
    include(".\Entidades\persona.php");

    class Alumno extends Persona
    {
        public $legajo;

        public function __construct($nombre, $edad, $dni, $legajo) 
        {
            parent::__construct($nombre, $edad, $dni);
            $this->legajo = $legajo;        
        }
        function retornarJSON()
        {
            return json_encode($this);
        }


        function guardarCSV($path, $mode)
        {
            $str  = $this->nombre . ";";
            $str .= $this->edad . ";";
            $str .= $this->dni . ";";
            $str .= $this->legajo . PHP_EOL;
            
            $gestor = fopen($path, $mode);
            fwrite($gestor, $str);
            fclose($gestor);
        }
        function leerCSV($path, $mode)
        {
            $gestor = fopen($path, $mode);

            
            
        }

        function guardarJSON($path, $mode)
        {            
            $gestor = fopen($path, $mode);
            fwrite($gestor, $this->retornarJSON().PHP_EOL);
            fclose($gestor);
        }
        function leerJSON($path, $mode)
        {
            
        }


        
        
    }
?>
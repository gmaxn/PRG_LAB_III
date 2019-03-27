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

        function leerAlumno()
        {
            
        }
        function guardar($path, $mode)
        {
            $str  = $this->nombre . ";";
            $str .= $this->edad . ";";
            $str .= $this->dni . ";";
            $str .= $this->legajo . PHP_EOL;
            
            $gestor = fopen($path, $mode);
            //fwrite($gestor, $str);
            fwrite($gestor, $this->retornarJSON().PHP_EOL);
            fclose($gestor);
        }        
    }
?>
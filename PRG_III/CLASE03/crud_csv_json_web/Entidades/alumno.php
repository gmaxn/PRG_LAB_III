<?php
    include("Entidades/persona.php");

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
        function guardarJSON($path, $mode)
        {            
            $gestor = fopen($path, $mode);
            fwrite($gestor, $this->retornarJSON().PHP_EOL);
            fclose($gestor);
        }
        function parsearJSON($arr)
        {
            
        }
        function guardarCSV($path, $mode)
        {
            $str  = $this->nombre . ",";
            $str .= $this->edad . ",";
            $str .= $this->dni . ",";
            $str .= $this->legajo .PHP_EOL;
            
            $gestor = fopen($path, $mode);
            fwrite($gestor, $str);
            fclose($gestor);
        }
        static function leerCSV($path, $mode)
        {
            $gestor = fopen($path, $mode);
            $contents = fread($gestor, filesize($path));
            $arrayContents = explode("\n", $contents);

            fclose($gestor);
            return $arrayContents;
        }

        static function codificarArchivo($data)
        {
            $arrayAlumnos = array();
            
            foreach($data as $row)
            {
                $datosAlumno = explode(",", $row);

                if($datosAlumno[0] != "")
                {
                    $nombre = trim($datosAlumno[0]);
                    $edad = trim($datosAlumno[1]);
                    $dni = trim($datosAlumno[2]);
                    $legajo = trim($datosAlumno[3]);

                    $arrayAlumnos[] = new Alumno($nombre, $edad, $dni, $legajo);
                }
            }
            return $arrayAlumnos;
        }

        function imprimirAlumno()
        {
            $str  = "<table style='border:1px solid black'>";
            $str .= "<tr>";
            $str .= "<th>Nombre</th>";
            $str .= "<th>Edad</th>";
            $str .= "<th>DNI</th>";
            $str .= "<th>Legajo</th>";
            $str .= "</tr>";

            $str .= "<tr>";
            $str .= "<th>$this->nombre</th>";
            $str .= "<th>$this->edad</th>";
            $str .= "<th>$this->dni</th>";
            $str .= "<th>$this->legajo</th>";
            $str .= "</tr>";
            $str .= "</table>";    
            return $str;
        }

    }
?>
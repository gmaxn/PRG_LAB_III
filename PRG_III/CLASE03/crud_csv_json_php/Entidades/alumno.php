<?php
    require_once("Entidades/persona.php");

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

        function retornarCSV()
        {
            $str  = $this->nombre . ",";
            $str .= $this->edad . ",";
            $str .= $this->dni . ",";
            $str .= $this->legajo;
            return $str;
        }


        static function decodificarCSV($data)
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





        // LECTURA Y ESCRITURA DE ARCHIVOS
        static function leerCSV($path, $mode)
        {
            $stream = fopen($path, $mode);
            $data = fread($stream, filesize($path));
            $dataArr = explode("\n", $data);

            fclose($stream);
            return $dataArr;
        }
        function guardarCSV($path, $mode)
        {
            $data = $this->retornarCSV() . PHP_EOL;
   
            $stream = fopen($path, $mode);
            fwrite($stream, $data);
            fclose($stream);
        }



        function guardarJSON($path, $mode)
        {
            $data = $this->retornarJSON() . PHP_EOL;      
            $stream = fopen($path, $mode);
            
            fwrite($stream, $data);
            fclose($stream);
        }




        static function getAlumnoByID($arr, $legajo)
        {
            foreach($arr as &$alumno)
            {
                if($alumno->legajo == $legajo)
                {
                    return $alumno; // retornar un alumno en lugar de un string
                }
            }
            return null;
        }

        function alumnoToString()
        {
            $str  = "<th>$this->nombre</th>";
            $str .= "<th>$this->edad</th>";
            $str .= "<th>$this->dni</th>";
            $str .= "<th>$this->legajo</th>";

            return $str;
        }

        function imprimirAlumno()
        {
            $str  = "<table border='1px'>";
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
            echo $str;
        }
























    }
?>
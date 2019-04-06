<?php
    require_once("Entidades/persona.php");

    class Alumno extends Persona
    {
        public $legajo;

        public function __construct($nombre, $apellido, $edad, $dni, $legajo) 
        {
            parent::__construct($nombre, $apellido, $edad, $dni);
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


        // LECTURA Y ESCRITURA DE ARCHIVOS
        static function leerCSV($path, $mode)
        {
            if(file_exists($path))
            {
                $stream = fopen($path, $mode);
                $data = fread($stream, filesize($path));
                fclose($stream);
                return $data;
            }
            return null;
        }
        
        static function decodificarCSV($rawFile)
        {
            if($rawFile != null)
            {
                $array = explode("\n", $rawFile);
                $arrayAlumnos = array();
            
                foreach($array as $row)
                {
                    $datosAlumno = explode(",", $row);
    
                    if($datosAlumno[0] != "")
                    {
                        $nombre = trim($datosAlumno[0]);
                        $edad = trim($datosAlumno[1]);
                        $dni = trim($datosAlumno[2]);
                        $legajo = trim($datosAlumno[3]);
                        $apellido = trim($datosAlumno[4]);
    
                        $arrayAlumnos[] = new Alumno($nombre, $apellido, $edad, $dni, $legajo);
                    }
                }
                return $arrayAlumnos;
            }
            return null;
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
                    return $alumno;
                }
            }
            return null;
        }

        static function remove(&$arrayAlumnos, $alumno)
        {
            $i = 0;
            foreach($arrayAlumnos as &$auxAlumno)
            {
                if($auxAlumno == $alumno)
                {
                    unset($arrayAlumnos[$i]);
                    return true;
                }
                $i++;
            }
            return false;
        }

        function alumnoToString()
        {
            $str  = "<th>$this->nombre</th>";
            $str .= "<th>$this->apellido</th>";
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
            $str .= "<th>$this->apellido</th>";
            $str .= "<th>$this->edad</th>";
            $str .= "<th>$this->dni</th>";
            $str .= "<th>$this->legajo</th>";
            $str .= "</tr>";
            $str .= "</table>";    
            echo $str;
        }
























    }
?>
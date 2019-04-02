<?php
    include_once("Entidades/alumno.php");

    $rawFileContent = Alumno::leerCSV("Archivos/ListadoAlumnos.csv", "r");
    $arrayAlumnos = Alumno::codificarArchivo($rawFileContent);

    
    if(!isset($_GET['legajo']))
    {
        var_dump($arrayAlumnos);
        listar($arrayAlumnos);
    }
    
    if(isset($_GET['legajo']))
    {
        $alumno = getAlumnoByID($arrayAlumnos, $_GET['legajo']);
        var_dump($alumno);
        imprimir($alumno);
    }
    
    //-----------------------------------
    
    function listar($arrayAlumnos)
    {
        $str  = "<table style='border:1px solid black'>";
        $str .= "<tr>";
        $str .= "<th>Nombre</th>";
        $str .= "<th>Edad</th>";
        $str .= "<th>DNI</th>";
        $str .= "<th>Legajo</th>";
        $str .= "</tr>";

        foreach($arrayAlumnos as $alumno)
        {
            $str .= "<tr>";
            $str .= "<th>$alumno->nombre</th>";
            $str .= "<th>$alumno->edad</th>";
            $str .= "<th>$alumno->dni</th>";
            $str .= "<th>$alumno->legajo</th>";
            $str .= "</tr>";
        }
        $str .= "</table>";  
        echo $str;
    }
    function getAlumnoByID($arr, $legajo)
    {
        foreach($arr as $alumno)
        {
            if($alumno->legajo == $legajo)
            {
                return $alumno; // retornar un alumno en lugar de un string
            }
        }
        return null;
    }
    function imprimir($alumno)
    {
        $str  = "<table style='border:1px solid black'>";
        $str .= "<tr>";
        $str .= "<th>Nombre</th>";
        $str .= "<th>Edad</th>";
        $str .= "<th>DNI</th>";
        $str .= "<th>Legajo</th>";
        $str .= "</tr>";
        $str .= "<tr>";
        $str .= "<th>$alumno->nombre</th>";
        $str .= "<th>$alumno->edad</th>";
        $str .= "<th>$alumno->dni</th>";
        $str .= "<th>$alumno->legajo</th>";
        $str .= "</tr>";
        $str .= "</table>";  
        echo $str;
    }

?>
<?php
    include_once(".\Entidades\alumno.php");


    if (isset($_POST['nombre']) &&
        isset($_POST['edad']) &&
        isset($_POST['dni']) &&
        isset($_POST['legajo'])) 
    {
        $nombre=$_POST['nombre'];
        $edad=$_POST['edad'];
        $dni=$_POST['dni'];
        $legajo=$_POST['legajo'];

        if(empty($nombre)||empty($edad)||empty($dni)||empty($legajo))
        {
            echo "faltan datos";
        }
        else
        {
            echo "se cargaron los datos correctamente: ";
            $miAlumno = new Alumno($nombre, $edad, $dni, $legajo);
            $miAlumno->guardarJSON("Archivos\ListadoAlumnos.json" ,"a+");
            $miAlumno->guardarCSV("Archivos\ListadoAlumnos.txt" ,"a+");
        }
    }
    
?>
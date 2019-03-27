<?php
    include_once("alumno.php");

    if (isset($_POST['tbxNombre']) &&
        isset($_POST['tbxEdad']) &&
        isset($_POST['tbxDNI']) &&
        isset($_POST['tbxLegajo'])) 
    {
        $nombre=$_POST['tbxNombre'];
        $edad=$_POST['tbxEdad'];
        $dni=$_POST['tbxDNI'];
        $legajo=$_POST['tbxLegajo'];

        if(empty($nombre)||empty($edad)||empty($dni)||empty($legajo))
        {
            echo "Some variables weren't setted correctly";
        }
        else
        {
            echo "the variables were setted successfully: ";
            $miAlumno = new Alumno($nombre, $edad, $dni, $legajo);
        }
    }
?>
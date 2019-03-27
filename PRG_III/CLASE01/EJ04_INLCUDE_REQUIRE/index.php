<?php
    include_once("alumno.php");
    include_once("crear_alumno.php");

    $miAlumno=new Alumno("maxi", 28, "35340965");
    //var_dump($miAlumno);

    echo $miAlumno->retornarJSON();
?>
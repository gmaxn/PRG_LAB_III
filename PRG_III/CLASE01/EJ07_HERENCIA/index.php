
<?php
    include("crear_alumno.php");

    echo $miAlumno->retornarJSON();
    echo "<br><br>";
    var_dump($miAlumno);
?>





<!-- 


<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>

    <body>
        <form action="crear_alumno.php" method="post">
            <label>Nombre: </label>
            <input type="text" name="tbxNombre">
            <label>Edad: </label>
            <input type="text" name="tbxEdad">
            <label>DNI: </label>
            <input type="text" name="tbxDNI">
            <label>Legajo: </label>
            <input type="text" name="tbxLegajo">
            <input type="submit">
        </form>

        
    </body>
</html>


 -->



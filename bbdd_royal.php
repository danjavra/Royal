<?php

function conectar($database){
    $con = mysqli_connect("localhost", "root", "", "$database")
            or die ("No se ha podido conectar con la BBDD.");
    return $con;
}

function desconectar($conexion){
    mysqli_close($conexion);
}
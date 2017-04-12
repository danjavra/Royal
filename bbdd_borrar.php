<?php

require_once 'bbdd_royal.php';

function selectAllUser(){
    $conectar = conectar("royal");
    $select = "select * from user where type!=1";
    $resultado = mysqli_query($conectar, $select);
    desconectar($conectar);
    return $resultado;
}

function borrarUsuario($usuario){
    $conectar = conectar("royal");
    $borrar = "delete from user where username='$usuario'";
    if(mysqli_query($conectar, $borrar)){
        echo"<br><br>Se ha borrado el usuario $usuario";
    }
    else{
        mysqli_error($conectar);
        
    }
    desconectar($conectar);
}
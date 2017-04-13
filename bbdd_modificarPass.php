<?php
require_once 'bbdd_royal.php';

function PasswordUsername($username){
     $conectar = conectar("royal");
     $select = "select password from user where username='$username'";
     $resultado = mysqli_query($conectar, $select);
     $fila = mysqli_fetch_array($resultado);
     extract($fila);
     desconectar($conectar);
     return $password;
}
function modificarPassword($nuevopass,$username){
    $conectar = conectar("royal");
    $update = "update user set password='$nuevopass' where username = '$username'";
    if(mysqli_query($conectar, $update)){
        echo"Se ha modificado la contraseña!";
    }
    else{
    mysqli_error($conectar);
    }
    desconectar($conectar);
}

function getTipoUsuario($username){
    $con = conectar ("royal");
    $query = "select type from user where username='$username'";
    $resultado = mysqli_query($con,$query);
    //extraemos el tipo para devolver ya el string con el tipo de user
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    return $type;
}
<?php

require_once 'bbdd_royal.php';

function getVictorias($username){
    $conectar = conectar("royal");
    $select = "select wins from user where username='$username'";
    $resultado = mysqli_query($conectar, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($conectar);
    return $wins;
    
}

function getLevel($username){
    $conectar = conectar("royal");
    $select = "select level from user where username='$username'";
    $resultado = mysqli_query($conectar, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($conectar);
    return $level;
}

function getCountCardUser($username){
    $conectar = conectar("royal");
    $select = "select count(*) as numeroCarta from deck where user='$username'";
    $resultado = mysqli_query($conectar, $select);
    $numero = mysqli_fetch_array($resultado);
    extract($numero);
    desconectar($conectar);
    return $numeroCarta;
}

function getCardUsername($username){
    $conectar = conectar("royal");
    $select = "select card from deck where user='$username'";
    $resultado = mysqli_query($conectar, $select);
    desconectar($conectar);
    return $resultado;
}

function getCardLevel($cartas){
    $conectar = conectar("royal");
    $select = "select level from deck where card='$cartas'";
    $resultado = mysqli_query($conectar, $select);
    desconectar($conectar);
    return $resultado;
}

function selectCardUser($card){
    $conectar = conectar("royal");
    $select = "select * from card where name='$card'";
    $resultado = mysqli_query($conectar, $select);
    desconectar($conectar);
    return $resultado;
    
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
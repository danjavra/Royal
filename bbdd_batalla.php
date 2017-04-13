<?php

require_once 'bbdd_royal.php';

function getCartaUsername($username){
    $conectar = conectar("royal");
    $select = "select card from deck where user='$username'";
    $resultado = mysqli_query($conectar, $select);
    desconectar($conectar);
    return $resultado;
}

function selectVidaCarta($cartas){
    $conectar = conectar("royal");
    $select = "select hitpoints from card where name='$cartas'";
    $resultado = mysqli_query($conectar, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($conectar);
    return $hitpoints;
}

function getNivelCarta($cartas){
    $conectar = conectar("royal");
    $select = "select level from deck where card='$cartas'";
    $resultado = mysqli_query($conectar, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($conectar);
    return $level;
}

function selectCalidadCarta($cartas){
    $conectar = conectar("royal");
    $select = "select rarity from card where name='$cartas'";
    $resultado = mysqli_query($conectar, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($conectar);
    return $rarity;
}

function selectElixirCarta($cartas){
    $conectar = conectar("royal");
    $select = "select cost from card where name='$cartas'";
    $resultado = mysqli_query($conectar, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($conectar);
    return $cost;
}

function updateVictoriasUser($username){
    $conectar = conectar("royal");
    $update = "update user set wins=wins+1 where username='$username'";
    if(mysqli_query($conectar, $update)){
        echo"";
    }
    else{
        mysqli_error($conectar);
    }
    desconectar($conectar); 
}

function selectVictoriasUser($username){
    $conectar = conectar("royal");
    $select = "select wins from user where username='$username'";
    $resultado = mysqli_query($conectar, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    return $wins;
}

function updateLevelUser($username){
    $conectar = conectar("royal");
    $update = "update user set level=level+1 where username='$username'";
    if(mysqli_query($conectar, $update)){
        echo"";
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
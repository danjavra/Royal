<?php
require_once 'bbdd_royal.php';

function numCartas(){
    $conectar = conectar("royal");
    $select = "select count(*) as numeroCarta from card";
    $resultado = mysqli_query($conectar, $select);
    $numero = mysqli_fetch_array($resultado);
    extract($numero);
    desconectar($conectar);
    return $numeroCarta;
}

function nombreCartas(){
    $conectar = conectar("royal");
    $select = "select name from card";
    $resultado = mysqli_query($conectar, $select);
    desconectar($conectar);
    return $resultado;
}

function existeCarta($username,$cartas){
     $conectar = conectar("royal");
     $select = "select * from deck where user='$username' and card='$cartas'";
     $resultado = mysqli_query($conectar, $select);
     $contador = mysqli_num_rows($resultado);
    desconectar($conectar);
   if($contador==0){
       return false;
   }
   else{
       return true;
   }
}

function cartasPremios($username,$carta,$level){
    $conectar = conectar("royal");
    $insert = "insert into deck values('$username','$carta',$level)";
    if(mysqli_query($conectar, $insert)){
        echo"";
    }else{
        mysqli_error($conectar);
    }
    desconectar($conectar);
}


function  actualizarCarta($username,$cartas){
    $conectar = conectar("royal");
    $update = "update deck set level=level+1 where user='$username' and card='$cartas'";
    if(mysqli_query($conectar, $update)){
        echo"";
    }
    else{
        mysqli_error($conectar);
    }
    desconectar($conectar);
}
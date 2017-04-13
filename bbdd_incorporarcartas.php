<?php
require_once 'bbdd_royal.php';

function selectUsuarios(){
    $conectar = conectar("royal");
    $select = "select * from user where type!=1";
    $resultado = mysqli_query($conectar, $select);
    desconectar($conectar);
    return $resultado;
}

function selectCartas(){
   $connectar = conectar("royal");
   $select = "select * from card";
   $resultado = mysqli_query($connectar, $select);
   desconectar($conectar);
   return $resultado;
}

function existeCarta($usuario,$cartas){
     $conectar = conectar("royal");
     $select = "select * from deck where user='$usuario' and card='$cartas'";
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

function incorporaCarta($usuario,$carta,$level){
    $conectar = conectar("royal");
    $insert = "insert into deck values('$usuario','$carta',$level)";
    if(mysqli_query($conectar, $insert)){
        echo"";
    }else{
        mysqli_error($conectar);
    }
    desconectar($conectar);
}

function actualizaCartas($usuario,$cartas){
    $conectar = conectar("royal");
    $update = "update deck set level=level+1 where user='$usuario' and card='$cartas'";
    if(mysqli_query($conectar, $update)){
        echo"";
    }
    else{
        mysqli_error($conectar);
    }
    desconectar($conectar);
}
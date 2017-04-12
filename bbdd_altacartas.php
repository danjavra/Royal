<?php
require_once 'bbdd_royal.php';

function ExisteCarta($cartas){
     $conectar = conectar("royal");
    $select = "select * from card where name='$cartas'";
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

function altaCartas($nombre, $tipo, $calidad, $vida, $damage, $elixir){
    $conectar = conectar("royal");
    $insert = "insert into card value('$nombre','$tipo','$calidad','$vida','$damage','$elixir')";
   if(mysqli_query($conectar, $insert)){
       echo"<p>Se ha dado de alta la carta $nombre</p>";
   }
   else{
       echo mysqli_error($conectar);
   }
   desconectar($conectar);
}
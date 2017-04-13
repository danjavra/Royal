<?php
require_once 'bbdd_royal.php';
function rankingUsuario(){
    $conectar = conectar("royal");
    $order = "select * from user order by level desc,wins desc limit 10";
    $resultado = mysqli_query($conectar, $order);
    desconectar($conectar);
    return $resultado;
    
}
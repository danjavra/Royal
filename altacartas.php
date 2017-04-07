<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Cartas</title>
    </head>
    <body>
       <h1>Dar de alta las cartas</h1>
       

<?php

   session_start();
        //Nos aseguramos de que haya un usuario autentificado
        if(isset($_SESSION["user"])){
        // cogemos la variable de sesión y saludamos al usuario
        $username = $_SESSION["user"];
        echo"Hola $username";
       
        require_once 'bbdd_altacartas.php';

if (isset($_POST['altacaratas'])){
    
    $nombre = $_POST['name'];
    $tipo = $_POST['type'];
    $calidad = $_POST['rarity'];
    $vida = $_POST['hitpoints'];
    $damage = $_POST['damage'];
    $elixir = $_POST['cost'];
    
   altaCartas($nombre, $tipo, $calidad, $vida, $damage, $elixir);     
}else{
   echo"<form ation=' ' method='POST'>"; 
   echo" Nombre: <input required type='text' name='nombre'><br></br>";
   echo" Tipo: <select name='type'>";
    echo"<option value=' '></option>
   
  <option value="Apple">Apple</option>
  <option value="Sony">Sony</option>
  <option value="Samsung">Samsung</option>
  <option value="Huawei">Huawei</option>";
    echo"</option>";
}
echo"</select><br></br>";
echo"<input type='submit' name='altapokemon' value='Alta'>";
echo"</form>";
echo"</br>";
}
}
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
        echo"¡Hola $username!<br>";
        echo"========================";
       
        require_once 'bbdd_altacartas.php';

if (isset($_POST['altacartas'])){
    
    $nombre = $_POST['name'];
    $tipo = $_POST['type'];
    $calidad = $_POST['rarity'];
    $vida = $_POST['hitpoints'];
    $damage = $_POST['damage'];
    $elixir = $_POST['cost'];
    if(ExisteCarta($nombre)== true){
                echo"<br>";
                echo"¡Carta repetida, ya existe esta carta!<br></br>";
                echo"<a href='altacartas.php'>Volver atrás</a><br></br>";
    }
    altaCartas($nombre, $tipo, $calidad, $vida, $damage, $elixir);
   echo"<a href='altacartas.php'>Volver atrás</a><br></br>";

}else{
   echo"<form ation=' ' method='POST'>"; 
   
   echo" Nombre: <input required type='text' name='name'><br></br>";
   echo" Tipo: <select name='type' required>";
   echo"<option value=' '></option>
  <option value='tropa'>Tropa</option>
  <option value='hechizo'>Hechizo</option>
  <option value='estructura'>Estructura</option>";
    echo"</option>";
   echo"</select><br></br>";
   echo" Calidad: <select name='rarity' required>";
   echo"<option value=' '></option>
  <option value='comun'>Común</option>
  <option value='especial'>Especial</option>
  <option value='epica'>Épica</option>
  <option value='legendaria'>Legendária</option>";
    echo"</option>";
   echo"</select><br></br>";
   echo" Vida: <input required type='number' name='hitpoints' min='0' max='20'><br></br>";
   echo" Daño: <input required type='number' name='damage' min='0' max='20'><br></br>";
   echo" Elixir: <input required type='number' name='cost' min='0' max='10'><br></br>";
   echo"<input type='submit' name='altacartas' value='Alta'>";
echo"</form>";
echo"</br>";
}
}

?>
 <br/>
       <a href="AdminHome.php">Volver a la página del administrador</a>


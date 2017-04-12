<html>
    <head>
        <meta charset="UTF-8">
        <title>Cofres</title>
    </head>
    <body>
        <h1>Bonus Cofres</h1>
       

<?php
require_once'bbdd_cofres.php';
session_start();
        //Nos aseguramos de que haya un usuario autentificado
        if(isset($_SESSION["nombre"])){
        // cogemos la variable de sesión y saludamos al usuario
        $username = $_SESSION["nombre"];
        echo"¡Hola $username!<br>";
        echo"========================";
        
         $numeroCartas=numCartas();
 
       $cartasArray = array();
       echo"<h1>¡El usuario $username, le han tocado 3 cartas!</h1>";
        
       $PosicionCartas = array();
        $Array3cartas = array();
       $nombreCartas = nombreCartas();
       
      $NombreCartasRand = array();
       
       
       for($i=0;$i<3;$i++){
           $nrandom = rand(0,$numeroCartas-1);   
           array_push($PosicionCartas, $nrandom);      
       }
       
       
        for($i=0;$i<$numeroCartas;$i++){
            $fila = mysqli_fetch_array($nombreCartas);
            extract($fila);
         $cartasArray[$i] = $name;
       }
       /*Imprime los nombres de las cartas*/
         for($i=0;$i<3;$i++){
             
         echo"<p style='font-size:30px'>".$cartasArray[$PosicionCartas[$i]]."</p>";
       }
       for($i=0;$i<3;$i++){
    
           array_push($NombreCartasRand, $cartasArray[$PosicionCartas[$i]]);
       }
       
       $existeCartas1 = existeCarta($username,$cartasArray[$PosicionCartas[0]]);
       $existeCartas2 = existeCarta($username,$cartasArray[$PosicionCartas[1]]);
       $existeCartas3 = existeCarta($username,$cartasArray[$PosicionCartas[2]]);
       $level = 1;
       for($i=0;$i<3;$i++){
           $existeCartas = existeCarta($username,$cartasArray[$PosicionCartas[$i]]);
     
           if($existeCartas==false){
               cartasPremios($username,$cartasArray[$PosicionCartas[$i]],$level);
           echo"<br><br>Se ha añadido la carta". $cartasArray[$PosicionCartas[$i]]. " en la bbdd<br>";
               
           }
           else if($existeCartas == true){
               actualizarCarta($username,$cartasArray[$PosicionCartas[$i]]);
           echo"<br><br>El usuario ". $username." ya tiene la carta ".$cartasArray[$PosicionCartas[$i]]." y se ha subido el nivel de la carta<br>";
               
           }
       }
       
        } 
        ?>
       
       <br/>
       <a href="login.php">Volver a la página de inicio</a>
  </body>
</html>

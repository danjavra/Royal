<html>
    <head>
        <meta charset="UTF-8">
        <title>Batalla1</title>
        
    </head>
    <body>
        <h1>Batalla</h1>
        <h2>Fase 1</h2>

<?php
require_once 'bbdd_batalla.php';

   session_start();
        //Nos aseguramos de que haya un usuario autentificado
        if(isset($_SESSION["user"])){
        // cogemos la variable de sesión y saludamos al usuario
        $username = $_SESSION["user"];
        echo"¡Hola $username!<br>";
        echo"========================";
      
        echo"<form action='' method='POST'>";
        $nombreCartas = getCartaUsername($username);
        echo"<p class='text'>Escoge una carta:";
        echo"<select name='carta' required>";
        while($fila = mysqli_fetch_array($nombreCartas)){
            extract($fila);
            echo"<option value='$card'>$card</option>";
        }
        echo"</select></p>";
        echo"<br><input  type='submit' name='lucha' value='Lucha'>";
        echo"</form>";
       
        $gana = 0;
        $fase1 = 0;
        if(isset($_POST['lucha'])){
           $cartas = $_POST['carta'];
           $numrandom = rand(0,50);
           $vida = selectVidaCarta($cartas);
           $level = getNivelCarta($cartas);
           $vidaPorNivel = $vida+($level*2);
           if($vidaPorNivel>$numrandom){
               echo"¡$username has ganado!<br>";
               echo"Numero random: $numrandom<br>";
               echo"Vida: $vidaPorNivel<br>";
               $gana++;
               $fase1++;
           }else if($vidaPorNivel<$numrandom){
               echo"¡$username has perdido! <br>";
               echo"Numero random: $numrandom<br>";
               echo"Vida: $vidaPorNivel<br>";
               
           }
 
           echo"<form action='batalla2.php' method='POST'>";
           echo"<input type='hidden' name='fase1' value='$fase1'>";
           echo"<input type='hidden' name='gana' value='$gana'>";
           echo"<br><input type='submit' value='Fase2'>";
           echo"</form>";
           
        }
        
        }
        
        ?>
    </body>
</html>

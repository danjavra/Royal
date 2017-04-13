<html>
    <head>
        <meta charset="UTF-8">
        <title>Batalla3</title>
        
    </head>
    <body>
        <h1>Batalla</h1>
        <h2>Fase 3</h2>
<?php
require_once 'bbdd_batalla.php';

   session_start();
        //Nos aseguramos de que haya un usuario autentificado
        if(isset($_SESSION["user"])){
        // cogemos la variable de sesión y saludamos al usuario
        $username = $_SESSION["user"];
        echo"¡Hola $username!<br>";
        echo"========================";
        
        $gana = $_POST['gana'];
        $fase1 = $_POST['fase1'];
        $fase2 = $_POST['fase2'];
        
       
        echo"<form action='' method='POST'>";
        $nombreCartas = getCartaUsername($username);
        echo"<p class='text'>Escoge una carta:";
        echo"<select name='carta' required>";
        while($fila = mysqli_fetch_array($nombreCartas)){
            extract($fila);
            echo"<option value='$card'>$card</option>";
        }
        echo"</select></p>";
        echo"<input type='hidden' name='fase1' value='$fase1'>";
        echo"<input type='hidden' name='fase2' value='$fase2'>";
        echo"<input type='hidden' name='gana' value='$gana'>";
        echo"<br><input type='submit'  name='lucha' value='Lucha'>";
        echo"</form>";
        
        if(isset($_POST['lucha'])){
            $gana = $_POST['gana'];
            $fase1 = $_POST['fase1'];
            $fase2 = $_POST['fase2'];
            $fase3 = 0;
            $cartas = $_POST['carta'];
            $elixirCartas = selectElixirCarta($cartas);
            $randElixir = rand(0,10);
            if($elixirCartas > $randElixir){
                $gana++;
                $fase3++;
            }
      
          if($fase1==0){
              echo"Fase1: ha perdido $username<br>";
          }
          else if($fase1==1){
              echo"Fase1: ha ganado $username<br>";
          }
          if($fase2==0){
              echo"Fase2: ha perdido $username<br>";
          }
          else if($fase2==1){
              echo"Fase2: ha ganado $username<br>";
          }
          if($fase3==0){
              echo"Fase3: ha perdido $username<br>";
              echo"Elixir de la carta: $elixirCartas<br>";
              echo"Elixir pensado: $randElixir<br>";
          }
          else if($fase3==1){
              echo"Fase3: ha ganado $username<br>";
              echo"Elixir de la carta: $elixirCartas<br>";
              echo"Elixir pensado: $randElixir<br>";
          }
          
          if($gana>=2){
              echo"$username ha ganado y se ha incrementado el numero de victorias<br>";
              
              updateVictoriasUser($username);
          }
          else if($gana<2){
             echo"$username ha perdido <br>";
             
          }
          
          
          $numeroVictorias = selectVictoriasUser($username);
          if($numeroVictorias%5==0){
              echo"¡Enhorabuena tu numero de victorias es multiplo de 5!<br>";
               echo"<a href='premios.php'>Click aquí para recibir el premio</a>";
          }
          
          if($numeroVictorias%10==0){
              updateLevelUser($username);
              echo"<br>Se ha subido el nivel del usuario $username<br>";
              
          }
                $tipo = getTipoUsuario($username);
                if($tipo == 0){
                    //dirigimos al usuario a su homepage.
                    echo"<br><br><a href='UserHome.php'>Volver al menú</a>";
                    
                }else if($tipo == 1){
                    //Dirigimos a la página de administrador
                    echo"<br><br><a href='AdminHome.php'>Volver al menú</a>";
                }
        }

        }
        ?>
    </body>
</html>  
<html>
    <head>
        <meta charset="UTF-8">
        <title>Batalla2</title>
        
    </head>
    <body>
        <h1>Batalla</h1>
        <h2>Fase 2</h2>
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
        
        echo"<form action='' method='POST'>";
        $nombreCartas = getCartaUsername($username);
        echo"<p class='text'>Escoge una carta:";
        echo"<select name='carta' required>";
        while($fila = mysqli_fetch_array($nombreCartas)){
            extract($fila);
            echo"<option value='$card'>$card</option>";
        }
        echo"</select></p>";
         echo"<input type='hidden' value='$fase1' name='fase1'>";
        echo"<input type='hidden' value='$gana' name='gana'>";
        echo"<br><input type='submit' name='lucha' value='Lucha'>";
        echo"</form>";
 
        $fase2 = 0;
        if(isset($_POST['lucha'])){
            $gana = $_POST['gana'];
            $fase1 = $_POST['fase1'];
            
            $cartas = $_POST['carta'];
            $calidadCartas = selectCalidadCarta($cartas);
            $calidadArray = array();
            $calidadArray[0] = "comun";
            $calidadArray[1] = "especial";
            $calidadArray[2] = "epica";
            $calidadArray[3] = "legendaria";
            $numrand = rand(0,3);
            $randCalidad = $calidadArray[$numrand];
            if($calidadCartas == $randCalidad){
                echo"¡$username has ganado! <br>";
                echo"Calidad de la carta: $calidadCartas<br>";
                echo"Calidad pensado: $randCalidad<br>";
              $gana++;
              $fase2++;
            }else if($calidadCartas != $randCalidad){
              echo"¡$username has perdido! <br>";
                echo"Calidad de la carta: $calidadCartas<br>";
                echo"Calidad pensado: $randCalidad<br>";
              
           }
           echo "";
             echo"<form action='batalla3.php' method='POST'>";
              echo"<input type='hidden' name='fase1' value='$fase1'>";
              echo"<input type='hidden' name='fase2' value='$fase2'>";
           echo"<input type='hidden' name='gana' value='$gana'>";
           echo"<br><input type='submit' value='Fase3'>";
           echo"</form>";
             
        }
        }
        ?>
        
       
    </body>
</html>

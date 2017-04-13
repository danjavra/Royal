<html>
    <head>
        <meta charset="UTF-8">
        <title>Perfil</title>
    </head>
    <body>
<?php

require_once'bbdd_perfil.php';
 session_start();
        //Nos aseguramos de que haya un usuario autentificado
        if(isset($_SESSION["user"])){
        // cogemos la variable de sesión y saludamos al usuario
        $username = $_SESSION["user"];
        echo"¡Hola $username!<br>";
        echo"========================";
        
        $victorias = getVictorias($username);
        $level = getLevel($username);
        
        $contadorCardUser = getCountCardUser($username);
        
        $nombreCartas = getCardUsername($username);
        
        $nombreCartasArray = array();
        $cartasNivelArray = array();
        $cartasDaño = array();
        $cartasVida = array();
     
        echo"<p>Nº de victorias: $victorias </p>";
        echo"<p>Nivel: $level</p>";
        
        echo"<br><h1>Cartas</h1></br>";
         for($i=0;$i<$contadorCardUser;$i++){
            $fila = mysqli_fetch_array($nombreCartas);
            extract($fila);        
            $nombreCartasArray[$i] = $card;
        }
        
          for($i=0;$i<$contadorCardUser;$i++){
            $cartasNivel=getCardLevel($nombreCartasArray[$i]);
            $fila = mysqli_fetch_array($cartasNivel);
            extract ($fila);
            $cartasNivelArray[$i] = $level;
        }
        for($i=0;$i<$contadorCardUser;$i++){
            $listaCartas = selectCardUser($nombreCartasArray[$i]);
            $fila = mysqli_fetch_array($listaCartas);
            extract($fila);
            $cartasDaño[$i]=$damage+$cartasNivelArray[$i]*2;
        }
        
        for($i=0;$i<$contadorCardUser;$i++){
            $listaCartas = selectCardUser($nombreCartasArray[$i]);
            $fila = mysqli_fetch_array($listaCartas);
            extract($fila);
            echo "Nombre: ".$name."<br>";
            echo "Tipo: ".$type."<br>";
            echo "Calidad: ".$rarity."<br>";
            echo "Vida: ".($hitpoints + $cartasNivelArray[$i]*2)."<br>";
            echo "Daño: ".($damage+$cartasNivelArray[$i]*2) ."<br>";
            echo "Elixir: ".$cost."<br><br><br>";
            
        }
       $tipo = getTipoUsuario($username);
                if($tipo == 0){
                    //dirigimos al usuario a su homepage.
                    echo"<a href='UserHome.php'>Volver al menú</a>";
                    
                }else if($tipo == 1){
                    //Dirigimos a la página de administrador
                    echo"<a href='AdminHome.php'>Volver al menú</a>";
                }
        }
     
        ?>
    </body>
</html>

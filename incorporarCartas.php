<html>
    <head>
        <meta charset="UTF-8">
        <title>Incorporar Carta a un usuario</title>
     
    </head>
    <body>
        <h1>Incorporar Carta a un Usuario</h1>
        
        <form action="" method="POST">
        <p>Escoge un usuario:
           
                <?php
                require_once 'bbdd_incorporarcartas.php';
                $usuarios = selectUsuarios();
                 echo"<select name='usuario'>";
                 while($fila=  mysqli_fetch_array($usuarios)){
                 extract($fila);
                 echo"<option value='$username'>$username</option>";
       }
                 echo"</select></p>"; 
                ?>
       
        <br>
        <p>Escoge una carta:
            <select name="carta">
                <?php
                $cartas = selectCartas();
                while($fila = mysqli_fetch_array($cartas)){
                    extract($fila);
                    echo"<option value='$name'>$name</option>";
                }
                ?>
            </select></p>
        <p><input class="incorporar" type="submit" name="incorporar" value="Incorporar una carta"></p>
        </form>
        
            <?php
        if(isset($_POST['incorporar'])){
            $usuarios = $_POST['usuario'];
            $carta = $_POST['carta'];
            $level = 1;
 
            if(existeCarta($usuarios,$carta)==false){
                
                incorporaCarta($usuarios,$carta,$level);
                echo"Se ha añadido la carta $carta al usuario $usuarios en la bbdd";
              
            }
            else if(existeCarta($usuarios,$carta)==true){
                
                actualizaCartas($usuarios,$carta);
                echo"Se ha subido el nivel de la carta $carta del usuario $usuarios porque ya tenía esta carta.";
  
            }
        }
        ?>
        
        <br><br><a href="AdminHome.php">Volver a la página del Administrador</a>

    </body>
</html>

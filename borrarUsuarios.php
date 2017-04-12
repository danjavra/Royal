<?php


session_start();
        //Nos aseguramos de que haya un usuario autentificado
        if(isset($_SESSION["user"])){
        // cogemos la variable de sesión y saludamos al usuario
        $username = $_SESSION["user"];
        echo"¡Hola $username!<br>";
        echo"========================";
        }
   ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Borrar Usuario</title>
    </head>
    <body>
        <h1>Borrar un usuario</h1>
        <div>
        <form action="" method="POST">
            <p class="text">Escoge un usuario:
       
        <?php
        require_once'bbdd_borrar.php';
        $usuarios = selectAllUser();
        echo"<select name='usuario'>";
       while($fila=  mysqli_fetch_array($usuarios)){
           extract($fila);
           echo"<option value='$username'>$username</option>";
       }
         echo"</select></p>";     
        ?>
                <br><input class="borrar" type="submit" name="borrar" value="Borrar"><br></br>
           <a class="back" href="AdminHome.php">Volver a la pàgina del Administrador</a>
           </div>
               <?php
        if(isset($_POST['borrar'])){
            $usuario = $_POST['usuario'];
            borrarUsuario($usuario);
        }
        ?>
            </form>
    </body>
</html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Pagina del usuario</title>
        
    </head>
    <body>
        <?php
        session_start();
        //Nos aseguramos de que haya un usuario autentificado
        if(isset($_SESSION["user"])){
        // cogemos la variable de sesión y saludamos al usuario
        $username = $_SESSION["user"];
        echo"Hola $username";
        }else{
            echo"No estás autentificado.";
        }
        ?>
         <br/>
           <a href="altacartas.php">Alta de cartas</a>
         <br/>
           <a href="rankingUsuarios.php">Ranking mejores usuarios</a>
         <br/>
           <a href="borrarUsuarios.php">Borrar un usuario</a>
         <br/>
         <a href="incorporarCartas.php">Incorporar carta a un usuario</a>   
         <br></br>
        <a href="royal.php">Inicio</a>
    </body>
</html>
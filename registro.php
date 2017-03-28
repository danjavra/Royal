<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Usuario</title>
    </head>
    <body>
 <form action="" method="POST">
            <p>Nombre de usuario: <input type="text" name="nombre"></p>
            <p>Password: <input type="password" name="pass"></p>
            <p>: <input type="password" name="cpass"></p>
            <input type="submit" value="registrarse" name="alta">
        </form>
<?php
  require_once 'bbdduser.php';
        //Si han pulsado el botón registramos el usuario
        if(isset($_POST["alta"])){
            //recogemos el nombre de usuario
            $nusuario = $_POST["nombre"];
            //Comprobamos si existe
            if(existeUsuario($nusuario) == true){
                echo"<p>Ya existe ese nombre de usuario en la bbdd</p>";
            }else{
                //Recogemos el resto de datos
                $pass = $_POST["pass"];
                $cpass = $_POST["cpass"];
                //Registramos el usuario en la bbdd
                insertUser($nusuario, $pass, $cpass);
            }
        }
?>
<p><a href="royal.php">Inicio</p>
</body>
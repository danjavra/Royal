<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Usuario</title>
    </head>
    <body>
 <form action="" method="POST">
     <p>Nombre de usuario: <input type="text" name="nombre" maxlength="20"></p>
     <p>Password: <input type="password" name="pass" maxlength="10"></p>
     <p>Confirmar password: <input type="password" name="cpass" maxlength="10"></p>
            <p><input type="hidden" name="type" value="0"></p>
            <p><input type="hidden" name="wins" value="0" maxlength="11"></p>
            <p><input type="hidden" name="level" value="1" maxlength="11"></p>
            <input type="submit" value="registrarse" name="alta">
        </form>
<?php
  require_once 'bbdduser.php';
        //Si han pulsado el botón registramos el usuario
        if(isset($_POST["alta"])){
            //recogemos el nombre de usuario
            $nusuario = $_POST["nombre"];
            $type = $_POST["type"];
            $wins = $_POST["wins"];
            $level = $_POST["level"];
            //Comprobamos si existe
            if(existeUsuario($nusuario) == true){
                echo"<p>Ya existe ese nombre de usuario en la bbdd</p>";
            }else {
                //Recogemos el resto de datos
                $pass = $_POST["pass"];
                $cpass = $_POST["cpass"];
                if($pass==$cpass){
                //Registramos el usuario en la bbdd
                insertUser($nusuario, $pass, $type, $wins, $level, $cpass);
                session_start();
                $_SESSION["nombre"]=$nusuario;
                header("Location: cofres.php ");
                }if($pass!=$cpass){
                echo"Error: La confirmación de la contraseña y la contraseña són diferentes.<br>";
            }
            
                }
        }
?>
        <br/>
<p><a href="royal.php">Inicio</p>
</body>
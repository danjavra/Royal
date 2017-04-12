<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar Password</title>
    </head>
    <body>
       <h1>Modificar Password del Usuario</h1>
       

<?php

   session_start();
        //Nos aseguramos de que haya un usuario autentificado
        if(isset($_SESSION["user"])){
        // cogemos la variable de sesión y saludamos al usuario
        $username = $_SESSION["user"];
        echo"¡Hola $username!<br>";
        echo"========================";
       

 echo'<form action="modpassword.php" method="post">
  
     <p>Password Actual: <input type="password" name="pass" required></p>
     <p>Password Nuevo: <input type="password" name="npass" maxlength="10" required></p>
     <p>Confirmar Password: <input type="password" name="cpass" maxlength="10" required></p>        
    <input type="submit" value="Modificar" name="Modificar">
 </form>';
  
  require_once 'bbdd_modificarPass.php';
   
      
        if(isset($_POST['Modificar'])){
       $username = $_SESSION["user"];
       $password = PasswordUsername($username);
       $actualpass = $_POST['pass'];
       $nuevopass = $_POST['npass'];
       $confirmar = $_POST['cpass'];    
        
            if($password==$actualpass && $nuevopass==$confirmar){
                modificarPassword($nuevopass,$username);
            }
            if($password!=$actualpass){
              echo"Contraseña incorrecta<br>";  
            }
            
            if($nuevopass!=$confirmar){
                echo"Error: La confirmación de la contraseña y la nueva contraseña són diferentes.<br>";
            }
         
        }

        }else{
            echo"No estás autentificado.";
        }
         ?>
       <br/>
       <a href="UserHome.php">Volver a la página del usuario</a>
  </body>
</html>
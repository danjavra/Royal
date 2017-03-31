<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        
    </head>
    <body>
        <form action="" method="POST">
            <p>Usuario: <input type="text" name="user"></p>
            <p>Password: <input type="password" name="pass"></p>
            <input type="submit" name="login" value="Login">
        </form>
        <?php
        require_once 'bbdduser.php';
        
        if(isset($_POST["login"])){
            //Recogemos los datos del login
            $username = $_POST["user"];
            $pass = $_POST["pass"];
            if (verificarUser($username, $pass)){ //verificarUser(..)==true
                echo"Usuario correcto";
                session_start();
                $_SESSION["user"]=$username;
                $tipo = getTipoUsuario($username);
                if($tipo == 0){
                    //dirigimos al usuario a su homepage.
                    header("Location: UserHome.php");
                }else if($tipo == 1){
                    //Dirigimos a la página de administrador
                    header("Location: AdminHome.php");
                }else{
                    echo"Tipo de usuario incorrecto";
                }
                }else{
                    echo"Nombre de usuario o contraseña incorrectos";
                }
                }
        ?>
    </body>
</html>
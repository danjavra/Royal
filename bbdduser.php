<?php

require_once 'bbdd_royal.php';
//Método que devuelve el tipo de Usuario
function getTipoUsuario($username){
    $con = conectar ("royal");
    $query = "select type from user where username='$username'";
    $resultado = mysqli_query($con,$query);
    //extraemos el tipo para devolver ya el string con el tipo de user
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    return $type;
}
//Función que verifica los datos de un user
function verificarUser($username, $password){
    $con = conectar("royal");
    $query = "select * from user where username='$username' and password='$password'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);
    desconectar($con);
    if ($filas > 0){
        return true;
    }else{
        return false;
    }
}
// Función que inserta un usuario de tipo usuario

function insertUser($nusuario,$pass,$type,$wins,$level){
    $conexion = conectar("royal");
    $insert = "insert into user values"
            ."('$nusuario','$pass', '$type', '$wins', '$level')";
    if (mysqli_query($conexion, $insert)){
        echo "<p>Usuario dado de alta</p>";
    }else{
        echo mysqli_error($conexion);
    }
    desconectar($conexion);
}

// Función que devuelve true si existe un usuario con el nombre de usuario que se le pasa y false si no existe
function existeUsuario($nombre_usuario){
    $conexion = conectar("royal");
    $consulta = "select * from user where username='$nombre_usuario';";
    //Ejecutamos la consulta
    $resultado = mysqli_query($conexion, $consulta);
    // Contamos cuantas filas tiene el resultado
    $contador =mysqli_num_rows($resultado);
    desconectar($conexion);
    //Si devueve 1 es que ya existe un usuario con ese nombre de usuario, si devuelve 0 no existe
    if($contador == 0){
        return false;
    }else{
        return true;
    }
}

//función que modifica los datos del usuario
function modificarPerfil($nusuario,$pass,$email){
    $conexion = conectar("royal");
    	$query = "update user set password = '$pass' where email = '$email'";

	if(mysqli_query($conexion, $query)){

		echo "<script>
			alert('Usuario modificado');
			window.history.go(-3);
			</script>";
	}

	else{

		echo mysqli_error($conexion);
	}

	desconectar($conexion);
}

function confirmarPass($pass,$cpass){
    
}

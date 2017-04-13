<html>
    <head>
        <meta charset="UTF-8">
        <title>Ranking Usuarios</title>
    </head>
     <style>
        .back{
    text-decoration: none;
    border: solid red 1px;
    padding: 0.5em;
    color: black;
    border: solid black 1px;
}
        *{
    box-sizing: border-box;
    font-family: cursive;
    padding: 0;
    margin:0;
}
        td,th{
            border:solid red 3px;
            padding: 0.4em 3em;
        }
        
        body{
            background-color: white;
        }
        
        table{
            font-size: 20px;
            text-align: center;
            margin: auto;
            padding: 1em;
        }
    </style>
    <body>
        <h1 style='text-align: center'>Ranking de Usuarios</h1>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Victorias</th>
                <th>Nivel</th>
            </tr>
            <?php

            require_once'bbdd_ranking.php';
            $ranking = rankingUsuario();
            while($fila = mysqli_fetch_array($ranking)){
                extract($fila);
                echo"<tr><td>$username</td><td>$wins</td><td>$level</td></tr>";
            }
            ?>
        </table>
        <a href="AdminHome.php">Volver al menú del Administrador</a>
    </body>
</html>

        
        
<?php
if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['id'])){
    echo "ERROR de inicio de session";
    exit();
}
if($_SESSION['expire'] > time() + (5 * 60)){
    exit();
}
$_SESSION['expire'] = time() + (5 * 60);
?>
<html>
    <head>
        <title>Insertar Departamentos</title>
    </head>
    <?php require_once("conexion2.php"); ?>
    <body>
        <form action="insertar_departamentos.php" method="post">
            <p> Nombre departamento <input type="text" name="nombre"></p>
            <p>
                <input type="hidden" name="primeravez" value=1>
                <input type="submit" name="submit" value="Enviar">
            </p>
        </form>

        <?php
        if(isset($_POST['primeravez'])){
            if(isset($_POST['nombre'])){ $nombre= mysqli_real_escape_string($DB,$_POST['nombre']);
            }
        }

        $errores=0;
        if(!isset($nombre)||$nombre==""){
            echo "<p><font color=red> Error. El nombre no puede estar en blanco</font></p>";
            $errores++;}

            if($errores==0){
                $sql="insert into departamentos (Nombre_departamento) values
                ('$nombre')";

                if($DB->query($sql)===TRUE){
                    echo "Departamento $nombre insertado correctamente";

                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        $DB->close();
        ?>
        PARA VOLVER HACIA EL MENU PULSA <a href=menu_insertar.php> AQUÍ </a>
    </body>
</html>
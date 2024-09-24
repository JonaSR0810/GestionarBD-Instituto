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
        <title>Insertar</title>
    </head>
    <?php require_once("conexion2.php"); ?>
    <body>
        <form action="insertar_profesores.php" method="post">
            <p> Nombre_profesor <input type="text" name="nombre"></p>
            <p> Apellidos <input type="text" name="apellidos"></p>
            <p> Codigo Departamento <input type="text" name="cod_dep"></p>

            <p>
                <input type="hidden" name="primeravez" value="1">
                <input type="submit" name="submit" value="Enviar">
            </p>
        </form>

        <?php
        if(isset($_POST['primeravez'])){
            if(isset($_POST['cod_dep'])){ $cod_dep= mysqli_real_escape_string($DB,$_POST['cod_dep']);}
            if(isset($_POST['nombre'])){ $nombre= mysqli_real_escape_string($DB,$_POST['nombre']);}
            if(isset($_POST['apellidos'])){ $ape= mysqli_real_escape_string($DB,$_POST['apellidos']);}
            
        }

        $errores=0;
        if(!isset($cod_dep)||$cod_dep==""){
            echo "<p><font color=red> Error. El dni no puede estar en blanco</font></p>";
           $errores++;}
        if(!isset($nombre)||$nombre==""){
            echo "<p><font color=red> Error. El nombre no puede estar en blanco</font></p>";
            $errores++;}
        if(!isset($ape)||$ape==""){
            echo "<p><font color=red> Error. Los apellidos no puede estar en blanco</font></p>";
            $errores++;}
       

            if($errores==0){
                $sql="insert into profesores (cod_departamento,nombre_profesor,apellido_profesor) values
                ('$cod_dep','$nombre','$ape')";

                if($DB->query($sql)===TRUE){
                    echo "Profesor $cod_dep $nombre $ape  insertado correctamente";

                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        $DB->close();
        ?>
        PARA VOLVER HACIA EL MENU PULSA <a href=menu_insertar.php> AQUÍ </a>
    </body>
</html>
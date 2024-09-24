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
        <form action="insertar_alumnos.php" method="post">
            <p> Nombre_alumno <input type="text" name="nombre"></p>
            <p> Apellidos <input type="text" name="apellidos"></p>
            <p> DNI <input type="text" name="dni"></p>
            <p> fecha nacimiento <input type="date" name="fnac"></p>

            <p>
                <input type="hidden" name="primeravez" value=1>
                <input type="submit" name="submit" value="Enviar">
            </p>
        </form>

        <?php
        if(isset($_POST['primeravez'])){
            if(isset($_POST['nombre'])){ $nombre= mysqli_real_escape_string($DB,$_POST['nombre']);}
            if(isset($_POST['apellidos'])){ $ape= mysqli_real_escape_string($DB,$_POST['apellidos']);}
            if(isset($_POST['dni'])){ $dni= mysqli_real_escape_string($DB,$_POST['dni']);}
            if(isset($_POST['fnac'])){ $fnac= mysqli_real_escape_string($DB,$_POST['fnac']);}
        }

        $errores=0;
        if(!isset($nombre)||$nombre==""){
            echo "<p><font color=red> Error. El nombre no puede estar en blanco</font></p>";
            $errores++;}
        if(!isset($ape)||$ape==""){
            echo "<p><font color=red> Error. Los apellidos no puede estar en blanco</font></p>";
            $errores++;}
        if(!isset($dni)||$dni==""){
             echo "<p><font color=red> Error. El dni no puede estar en blanco</font></p>";
            $errores++;}
         if(!isset($fnac)||$fnac==""){
            echo "<p><font color=red> Error. El fnac no puede estar en blanco</font></p>";
            $errores++;}

            if($errores==0){
                $sql="insert into alumnos (nombre_alumnos,apellidos,DNI,fecha_nac) values
                ('$nombre','$ape','$dni',$fnac)";

                if($DB->query($sql)===TRUE){
                    echo "Alumno $nombre $ape $dni $fnac insertado correctamente";

                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        $DB->close();
        ?>
        PARA VOLVER HACIA EL MENU PULSA <a href=menu_insertar.php> AQUÍ </a>
    </body>
</html>
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
        <title>Insertar Grupos</title>
    </head>
    <?php require_once("conexion2.php"); ?>
    <body>
        <form  action="insertar_grupos.php" method="post">
        Alumno <SELECT name="cod_alu">
        <?php
            $sql="SELECT apellidos,nombre_alumnos,cod_alumno from alumnos order by apellidos, nombre_alumnos";
            if(!$resultado = $DB->query($sql)){
                exit("Lo sentimos, este sitio web esta experimentando problemas");
            }
            while ($alumnos = $resultado->fetch_assoc()){
                echo "<option value=" .$alumnos['cod_alumno']." >".$alumnos['apellidos']." ".$alumnos['nombre_alumnos']." </option>";

            }
            $resultado->free();
            ?>
        </SELECT><br>
       
        <br>
        Profesores <SELECT name="cod_pro">
        <?php
            $sql="SELECT cod_profesor,nombre_profesor,apellido_profesor from profesores";
            if(!$resultado = $DB->query($sql)){
                exit("Lo sentimos, este sitio web esta experimentando problemas");
            }
            while ($profe = $resultado->fetch_assoc()){
                echo "<option value=" .$profe['cod_profesor']." >".$profe['nombre_profesor']." ".$profe['apellido_profesor']." </option>";

            }
            $resultado->free();
            ?>
        </SELECT><br>
        Grupo <input type="text" name="grupo"><br>

        <input type="hidden" name="primeravez">
        <input type="submit" value="Enviar">
        </form>
        <?php
        if(isset($_POST['primeravez'])){
            if(isset($_POST['cod_alu'])){ $cod_alumno= mysqli_real_escape_string($DB,$_POST['cod_alu']);}
            if(isset($_POST['cod_pro'])){ $cod_pro= mysqli_real_escape_string($DB,$_POST['cod_pro']);}
            if(isset($_POST['grupo'])){ $grupo= mysqli_real_escape_string($DB,$_POST['grupo']);}

        }

        $errores=0;
        if(!isset($cod_alumno)||$cod_alumno==""){
            echo "<p><font color=red> Error. El cod_alumno no puede estar en blanco</font></p>";
            $errores++;}
        if(!isset($cod_pro)||$cod_pro==""){
            echo "<p><font color=red> Error. El cod_pro no puede estar en blanco</font></p>";
            $errores++;}
        if(!isset($grupo)||$grupo==""){
             echo "<p><font color=red> Error. El grupo no puede estar en blanco</font></p>";
            $errores++;}


            if($errores==0){
                $sql="insert into grupos (cod_alumno,cod_profesor,curso) values
                ('$cod_alumno','$cod_pro','$grupo')";

                if($DB->query($sql)===TRUE){
                    echo "El Grupo con el codigo del alumno $cod_alumno profesor $cod_pro esta insertado correctamente";

                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        ?>
        PARA VOLVER HACIA EL MENU PULSA <a href=menu_insertar.php> AQUÍ </a>
    </body>
</html>
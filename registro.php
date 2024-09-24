<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="registro1.css">
</head>
<?php require_once("conexion2.php");?>
<body>
    <div class="login-box">
        <h2>Registrar Profesor</h2>

        <form action="registro.php" method="post">
            <div class="user-box">
                <input type="text" name="nombre" required="">
                <label for="">Nombre</label>
            </div>
            <div class="user-box">
                <input type="text" name="apellido" required="">
                <label for="">Apellido</label>

                <div class="user-box">
                <input type="text" name="coddep" required="">
                <label for="">CODIGO DEPARTAMENTO</label>
            </div>

            </div>
            <div class="user-box">
                <input type="text" name="nick" required="">
                <label for="">Nick</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label for="">Password</label>
            </div>

            <input type="hidden" name="primeravez">
            <button type="submit" class="submit-btn">Registrarse</button>
            <br><a href="login.html"><font color="#FFF700">¿Ya tienes cuenta?</a></font>
        </form>
    </div>

<?php
    if(isset($_POST['primeravez'])){
        if(isset($_POST['nombre'])){ $nombre = mysqli_real_escape_string($DB,$_POST['nombre']);}
        if(isset($_POST['apellido'])){ $apellido = mysqli_real_escape_string($DB,$_POST['apellido']);}
        if(isset($_POST['coddep'])){ $coddep = mysqli_real_escape_string($DB,$_POST['coddep']);}
        if(isset($_POST['nick'])){ $nick = mysqli_real_escape_string($DB,$_POST['nick']);}
        if(isset($_POST['password'])){ $password = mysqli_real_escape_string($DB,$_POST['password']);}

        if(isset($_POST['password'])){
            $password=sha1($_POST['password']);
        }

         $errores=0;
        if(!isset($nombre) || $nombre==""){
            echo "<p><font color=red> Error. El nombre no puede estan en blanco</font></p>";
            $errores++;
        }
         if(!isset($apellido) || $apellido==""){
             echo "<p><font color=red> Error. El apellido no puede estan en blanco</font></p>";
            $errores++;
        }
        if(!isset($nick) || $nick==""){
            echo "<p><font color=red> Error. El nombre de usuario no puede estan en blanco</font></p>";
            $errores++;
        }
        if(!isset($password) || $password==""){
            echo "<p><font color=red> Error. La contraseña no puede estan en blanco</font></p>";
            $errores++;
        }

        if($errores==0){
            $sql="insert into profesores (cod_departamento,nombre_profesor,apellido_profesor,nick,password) values
                  ($coddep,'$nombre','$apellido','$nick','$password')";
        }

        if($DB->query($sql)===TRUE){
            header('location:login.html');
        }   
    }
     $DB->close();

?>
    </body>
</html>
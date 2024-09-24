<?php session_start();
require_once("conexion2.php");
if(isset($_POST['nick']) &&$_POST['nick']!=""&&isset($_POST['password']) &&$_POST['password']!=""){
    $nick=mysqli_real_escape_string($DB,$_POST['nick']);
    $password=mysqli_real_escape_string($DB,$_POST['password']);
    $pass_sha=sha1($password);
    $sql="SELECT * FROM profesores WHERE nick = '$nick'";
    if(!$resultado = $DB->query($sql)) {
        echo "Lo sentimos, este sitio web esta experimentado problemas";
    }

    if(!$resultado->num_rows === 0){
        echo "Lo sentimos. Usuario erroneo. <a href=login.html> Volver a intentarlo </a>";
        exit;
    }
    $profe=$resultado->fetch_assoc();
    if($profe['password'] !=$pass_sha){
        echo "Lo sentimos. Clave incorrecta. <a href=login.html> Volver a intentarlo</a>";
        exit;
    }
    $_SESSION['id']=sha1($nick);
    $_SESSION['username']=$profe['nombre_profesor']." ".$profe['apellidos_profesor'];
    $_SESSION['start']=time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    $_SESSION['nivel']=$profe['nivel_pro'];
    $resultado->free();
    $DB->close();
    header('location:index2.html');
}
?>
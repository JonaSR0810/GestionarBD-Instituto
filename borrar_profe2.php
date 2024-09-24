<?php require_once("conexion2.php") ?>
<?php
if(isset($_POST['oculto'])){
    $codigo=mysqli_real_escape_string($DB,$_POST['oculto']);
    $sql="delete from profesores where cod_profesor = $codigo";
    echo "PARA PODER BORRAR A PROFESORES NECESITAS ELIMINAR ANTES LA FOREIGN KEY DE COD DEPARTAMENTO";
    if ($DB->query($sql) === TRUE) {
        header("location: borrar_profesor.php");
        exit();
    }
}
?>
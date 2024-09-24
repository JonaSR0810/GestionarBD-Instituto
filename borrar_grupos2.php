<?php require_once("conexion2.php") ?>
<?php
if(isset($_POST['oculto'])){
    $codigo=mysqli_real_escape_string($DB,$_POST['oculto']);
    $sql="delete from grupos where cod_curso = $codigo";
    if ($DB->query($sql) === TRUE) {
        header("location: borrar_grupos.php");
        exit();
    }
}
?>
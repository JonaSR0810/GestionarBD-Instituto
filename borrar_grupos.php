<?php
if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['id'])){
    echo "ERROR de inicio de sesion";
    exit();
}
if($_SESSION['expire'] > time() + (5 * 60)){
    exit();
}
$_SESSION['expire'] = time() + (5 * 60);
?>
<html>
<head>
<?php require_once("conexion2.php"); ?>
</head>
<body>
    <?php
    $sql="SELECT * from grupos";

    if(!$resultado = $DB->query($sql)) {
        echo "Lo sentimos, este sitio web esta experimentado problemas";
    }

    if(!$resultado->num_rows === 0){
        echo "Lo sentimos. No puedo encontrar una coincidencia para el ID $aid. Intentelo de nuevo";
        exit;
    }
    
    
    echo "<table border=1>";
    echo " <th> CODIGO ALUMNO </th> <th> CODIGO PROFESOR </th> <th> CURSO </th></tr>";
     while ($grupo = $resultado->fetch_assoc()){
        echo "<form action=borrar_grupos2.php method=post>";
        echo "<tr> <td>".$grupo['cod_alumno']."</td> <td>".$grupo['cod_profesor']."</td> <td>".$grupo['curso']."</td><td><input type=submit value=borrar></td></tr>";
        echo "<input type=hidden name=oculto value=".$grupo['cod_curso'].">";
        echo "</form>"; 

     }

    $resultado->free();
    $DB->close();
    ?>
    PARA VOLVER HACIA EL MENU PULSA <a href=menu_borrar.php> AQUÍ </a>
</body>
    </html>
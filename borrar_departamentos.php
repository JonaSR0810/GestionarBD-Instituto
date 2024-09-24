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
<?php require_once("conexion2.php"); ?>
</head>
<body>
    <?php
    $sql="SELECT * from departamentos";

    if(!$resultado = $DB->query($sql)) {
        echo "Lo sentimos, este sitio web esta experimentado problemas";
    }

    if(!$resultado->num_rows === 0){
        echo "Lo sentimos. No puedo encontrar una coincidencia para el ID $aid. Intentelo de nuevo";
        exit;
    }
    
    
    echo "<table border=1>";
    echo "<th> NOMBRE </th> </tr>";
     while ($dept = $resultado->fetch_assoc()){
        echo "<form action=borrar_departamentos2.php method=post>";
        echo "<tr><td>".$dept['Nombre_departamento']."</td> <td><input type=submit value=borrar></td></tr>";
        echo "<input type=hidden name=oculto value=".$dept['cod_departamento'].">";
        echo "</form>"; 

     }

    $resultado->free();
    $DB->close();
    ?>
    PARA VOLVER HACIA EL MENU PULSA <a href=menu_borrar.php> AQUÍ </a>
</body>
    </html>
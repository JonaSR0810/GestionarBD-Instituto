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
    $sql="SELECT * from profesores";

    if(!$resultado = $DB->query($sql)) {
        echo "Lo sentimos, este sitio web esta experimentado problemas";
    }

    if(!$resultado->num_rows === 0){
        echo "Lo sentimos. No puedo encontrar una coincidencia para el ID $aid. Intentelo de nuevo";
        exit;
    }
    
    
    echo "<table border=1>";
    echo " <th> COD_DEPARTAMENTO</th> <th> NOMBRE </th> <th> APELLIDOS </th> </tr>";
     while ($profe = $resultado->fetch_assoc()){
        echo "<form action=borrar_profe2.php method=post>";
        echo "<tr> <td>".$profe['cod_departamento']."</td> <td>".$profe['nombre_profesor']."</td> <td>".$profe['apellido_profesor']."</td> <td><input type=submit value=borrar></td></tr>";
        echo "<input type=hidden name=oculto value=".$profe['cod_profesor'].">";
        echo "</form>"; 

     }


    $resultado->free();
    $DB->close();
    ?>
    PARA VOLVER HACIA EL MENU PULSA <a href=menu_borrar.php> AQUÍ </a>
</body>
    </html>
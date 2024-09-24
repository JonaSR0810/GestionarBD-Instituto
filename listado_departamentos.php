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
    
    ?>
    <table border=1>
    <th> CODIGO </th> <th> NOMBRE </th></tr>
    <?php while ($dept = $resultado->fetch_assoc()){ ?>
        <tr><td><?php echo $dept['cod_departamento']?> </td> <td> <?php  echo $dept['Nombre_departamento']; ?>  </td> 
    <?php } 

    
    $resultado->free();
    $DB->close();
    ?>
    PARA VOLVER HACIA EL MENU PULSA <a href=menu_consultas.php> AQUÍ </a>
</body>
</html>
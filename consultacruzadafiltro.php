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
    <form action="consultacruzadafiltro.php" method="post">
        Nombre <input type="text" name="nombre_pro"><br>
         Apellidos <input type="text" name="apellido"><br>
         Curso <input type="text" name="curso"><br>
         Nombre Departamento <input type="text" name="nom_dep"><br> 
        <input type="submit" value="Enviar">
    </form>
    <?php

    $sql="SELECT profesores.nombre_profesor, profesores.apellido_profesor, grupos.curso, departamentos.Nombre_departamento FROM profesores, departamentos, grupos
    WHERE departamentos.cod_departamento=profesores.cod_departamento AND grupos.cod_profesor=profesores.cod_profesor";
    if(isset($_POST['nombre_pro'])){
        $nombre_profe=$_POST['nombre_pro'];
        $sql=$sql." AND nombre_profesor like '%$nombre_profe%'";
    }
    if(isset($_POST['apellido'])){
        $ape=$_POST['apellido'];
        $sql=$sql." AND apellido_profesor like '%$ape%'";
    }
    if(isset($_POST['curso'])){
        $curso=$_POST['curso'];
        $sql=$sql." AND curso like '%$curso%'";
    }
    if(isset($_POST['nom_dep'])){
        $nomdep=$_POST['nom_dep'];
        $sql=$sql." AND Nombre_departamento like '%$nomdep%'";
    }

    if(!$resultado = $DB->query($sql)) {
        echo "Lo sentimos, este sitio web esta experimentado problemas";
    }

    if($resultado->num_rows === 0){
        echo "Lo sentimos. No puedo encontrar una coincidencia para el ID $aid. Intentelo de nuevo";
        exit;
    }
 

if(!$resultado = $DB->query($sql)) {
    echo "Lo sentimos, este sitio web esta experimentado problemas";
}

if($resultado->num_rows === 0){
    echo "Lo sentimos. No puedo encontrar una coincidencia para el ID $aid. Intentelo de nuevo";
    exit;
}

?>
<table border=1>
<th> NOMBRE PROFESOR </th> <th> APELLIDO</th> <th> CURSO</th>  <th> NOMBRE DEPARTAMENTO</th></tr>
<?php while ($dept = $resultado->fetch_assoc()){ ?>
    <tr><td><?php echo $dept['nombre_profesor']?> </td> <td> <?php  echo $dept['apellido_profesor']; ?>  </td> <td> <?php  echo $dept['curso']; ?>  </td> <td> <?php  echo $dept['Nombre_departamento']; ?>  </td></tr>
<?php } ?>
PARA VOLVER HACIA EL MENU PULSA <a href=menu_consultas.php> AQUÍ
</body>
</html>
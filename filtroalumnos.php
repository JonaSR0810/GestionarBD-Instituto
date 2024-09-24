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
    <form name="fitro1" action="filtroalumnos.php" method="post">
        Nombre <input type="text" name="nombre_alumnos"><br>
         Apellido <input type="text" name="apellido"><br>
         DNI <input type="text" name="dni"><br>
        <input type="hidden" name="oculto" value=1>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if(isset($_POST['oculto'])){
        $sql="SELECT * from alumnos where 1=1";
        if(isset($_POST['nombre_alumnos'])){
            $nombre_alumnos=$_POST['nombre_alumnos'];
            $sql=$sql." AND nombre_alumnos like '%$nombre_alumnos%'";
        }
        
        if(isset($_POST['apellido'])){
            $ap1=$_POST['apellido'];
            $sql=$sql." AND apellidos like '%$ap1%'";
        }
        if(isset($_POST['dni'])){
            $dni=$_POST['dni'];
            $sql=$sql." AND DNI like '%$dni%'";
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
        <th> NOMBRE </th> <th> APELLIDO </th> <th> DNI </th></tr>
        <?php while ($alumno = $resultado->fetch_assoc()){ ?>
            <tr><td><?php echo $alumno['nombre_alumnos']?> </td> <td> <?php  echo $alumno['apellidos']; ?>  </td><td> <?php  echo $alumno['DNI']; ?>  </td></tr>
        <?php } ?>
        <?php
    } 
    ?>
    PARA VOLVER HACIA EL MENU PULSA <a href=menu_consultas.php> AQUÍ
</body>
</html>
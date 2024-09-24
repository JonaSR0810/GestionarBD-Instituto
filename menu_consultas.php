<?php
if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['id'])){
    echo "ERROR DE INICIO DE SESION //// NECESITAS LOGUEARTE PARA PODER ENTRAR";
    exit();
}
if($_SESSION['expire'] > time() + (5 * 60)){
    exit();
}
$_SESSION['expire'] = time() + (5 * 60);

?>
<html>
    <body>
 <?php "Bienvenido " . $_SESSION['username'] . " <br>";?>
 <h1>MENÚ</h1>
         <h3> CONSULTAS: </h3>
         <hr>
      <ul>
          <li> <a href=listado_alumnos.php> Listar Alumnos </a> </li>
         <li> <a href=listado_profesores.php> Listar Profesores </a> </li>
          <li> <a href=listado_grupos.php> Listar Grupos </a> </li>
          <li> <a href=listado_departamentos.php> Listar Departamentos </a> </li>
          <li> <a href=filtroalumnos.php> Filtrar Alumnos </a> </li>
          <li> <a href=filtrodepartamentos.php> Filtrar Departamentos </a> </li>
          <li> <a href=consultacruzada.php> Consulta Cruzada </a> </li>
          <li> <a href=consultacruzadafiltro.php> Consulta Cruzada Con Filtros </a> </li>
      </ul>
      <hr>
      Para cerrar sesión pulse en <a href=logout.php>  -Desconectar- </a> <br>
       <br>
       
        Para salir al menu principal pulsa aquí ---- <a href=index2.html> MENÚ PRINCIPAL </a>
       
   </body>
   </html>



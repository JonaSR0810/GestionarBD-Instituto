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
if($_SESSION['nivel'] != 2){echo "NO TIENES PERMISOS PARA PODER ENTRAR";
    exit();
}
  ?>
    <html>
        <body>
     <?php "Bienvenido " . $_SESSION['username'] . " <br>";?>
     <h1>MENÚ</h1>
         <h3> INSERTAR: </h3>
         <hr>
          <ul>
          <li> <a href=insertar_alumnos.php> Insertar Alumnos </a> </li>
             <li> <a href=insertar_profesores.php> Insertar Profesores </a> </li>
              <li> <a href=insertar_departamentos.php> Insertar Departamentos </a> </li>
              <li> <a href=insertar_grupos.php> Insertar Grupos </a> </li>
    
          </ul>
          <hr>
          Para cerrar sesión pulse en <a href=logout.php>  -Desconectar- </a> <br>
           <br>
           Para salir al menu principal pulsa aquí ---- <a href=index2.html> MENÚ PRINCIPAL
       </body>
       </html>





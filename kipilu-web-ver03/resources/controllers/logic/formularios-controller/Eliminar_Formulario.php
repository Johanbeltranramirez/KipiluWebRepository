<?php
include ("../db.php");
$ID_Formulario=$_GET['ID_Formulario'];

$sql="Delete from formularios where ID_Formulario='".$ID_Formulario."'";
$resultado = mysqli_query($conexion, $sql);

if($resultado){
  echo "<script language='JavaScript'>
  alert('El formulario se eliminó
      correctamente de la BD');
  location.assign('CRUD_FORMULARIO/CRUD_Formulario.php');
  </script>";
  header("location: ../controllers/formularios_controller.php");
}else{
  echo "<script language='JavaScript'>
  alert('El formulario NO se eliminó
      correctamente de la BD');
  location.assign('../controllers/formularios_controller.php');
  </script>";
  header("location:../controllers/formularios_controller.php");
}
?>
<a href="../controllers/formularios_controller.php">Regresar</a>
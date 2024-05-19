<?php
    include ("../db.php");
    $ID_Comentario=$_GET['ID_Comentario'];

    $sql="delete from comentaristas where ID_Comentario='".$ID_Comentario."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script language='JavaScript'>
        alert('Los datos se eliminaron 
            correctamente de la BD');
        location.assign('CRUD_COMENTARIO/CRUD_Comentarios.php');
        </script>";
        header("location: ../CRUD_COMENTARIO/CRUD_Comentarios.php");
    }else{
        echo "<script language='JavaScript'>
        alert('Los datos se NO eliminaron 
            correctamente de la BD');
        location.assign('CRUD_COMENTARIO/CRUD_Comentarios.php');
        </script>";
        header("location: ../CRUD_COMENTARIO/CRUD_Comentarios.php");
    }
?>
<a href="CRUD_COMENTARIO/CRUD_Comentarios.php">Regresar</a>

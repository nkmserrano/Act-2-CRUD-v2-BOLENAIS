<?php 
    if(!isset($_GET['id_opinion'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $id_opinion = $_GET['id_opinion'];

    $sentencia = $bd->prepare("DELETE FROM tbl_opiniones where id_opinion = ?;");
    $resultado = $sentencia->execute([$id_opinion]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>
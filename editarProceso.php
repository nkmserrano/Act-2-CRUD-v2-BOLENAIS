<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id_cliente = $_POST["num_id_cliente"];
    $fecha_opinion = $_POST["fecha_opinion"];
    $calificacion = $_POST["cali"];
    $queja = $_POST["txtqueja"];
    $porque = $_POST["txtpq"];
    $sucursal = $_POST["txtsucu"];
    $sugerencia = $_POST["txtsug"];

    $sentencia = $bd->prepare("UPDATE tbl_opiniones SET id_cliente = ?, fecha_opi = ?, calificacion = ? 
    queja = ?, porque = ?, sucursal = ? sugerencia = ? where id_opinion = ?;");
    $resultado = $sentencia->execute([$id_cliente, $fecha_opinion, $calificacion, $queja, $porque, $sucursal, $sugerencia, $id_opinion]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["num_id_cliente"]) || empty($_POST["fecha"]) || empty($_POST["cali"])
    || empty($_POST["txtqueja"]) || empty($_POST["txtpq"]) || empty($_POST["txtsucu"]) || empty($_POST["txtsug"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $id_cliente = $_POST["num_id_cliente"];
    $fecha = $_POST["fecha"];
    $calificacion = $_POST["cali"];
    $queja = $_POST["txtqueja"];
    $porque = $_POST["txtpq"];
    $sucursal = $_POST["txtsucu"];
    $sugerencia = $_POST["txtsug"];
    
    $sentencia = $bd->prepare("INSERT INTO `tbl_opiniones`( `id_cliente`, `fecha_opi`, `calificacion`, `queja`, `porque`, `sucursal_compra`, `sugerencia`) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$id_cliente,$fecha,$calificacion,$queja,$porque,$sucursal,$sugerencia]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
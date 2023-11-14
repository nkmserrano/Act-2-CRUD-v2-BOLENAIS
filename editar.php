<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id_opinion'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id_opinion = $_GET['id_opinion'];

    $sentencia = $bd->prepare("select * from tbl_opiniones where id_opinion = ?;");
    $sentencia->execute([$id_opinion]);
    $opinion = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($opinion);
?>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Id_Cliente: </label>
                        <input type="number" class="form-control" name="num_id_cliente" autofocus required 
                        value="<?php echo $opinion->id_cliente; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Opinion: </label>
                        <input type="date" class="form-control" name="fecha" autofocus required
                        value="<?php echo $opinion->fecha_opi; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calificacion del trato que se le dio: </label>
                        <input type="number" class="form-control" name="cali" autofocus required
                        value="<?php echo $opinion->calificacion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Queja: </label>
                        <input type="text" class="form-control" name="txtqueja" autofocus required
                        value="<?php echo $opinion->queja; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">El por que de la queja: </label>
                        <input type="text" class="form-control" name="txtpq" autofocus required
                        value="<?php echo $opinion->porque; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sucursal donde se le atendio: </label>
                        <input type="text" class="form-control" name="txtsucu" autofocus required
                        value="<?php echo $opinion->sucursal_compra; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sugerencia:  </label>
                        <input type="text" class="form-control" name="txtsug" autofocus required
                        value="<?php echo $opinion->sugerencia; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id_opinion" value="<?php echo $opinion->id_opinion; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                    <br><br><br>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>

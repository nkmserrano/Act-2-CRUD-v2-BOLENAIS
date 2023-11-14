<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from tbl_opiniones");
    $opinion = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($opinion);
?>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card ">
                <div class="card-header ">
                    Opinion del cliente            </div>
                <div class="p-4 table-responsive">
                    <table class="table align-middle ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID_Cliente</th>
                                <th scope="col">Fecha Opinion</th>
                                <th scope="col">Calificacion al trato</th>
                                <th scope="col">Queja</th>
                                <th scope="col">El porque de la queja</th>
                                <th scope="col">Sucursal de compra</th>
                                <th scope="col">Sugerencia</th>

                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($opinion as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id_opinion; ?></td>
                                <td><?php echo $dato->id_cliente; ?></td>
                                <td><?php echo $dato->fecha_opi; ?></td>
                                <td><?php echo $dato->calificacion; ?></td>
                                <td><?php echo $dato->queja; ?></td>
                                <td><?php echo $dato->porque; ?></td>
                                <td><?php echo $dato->sucursal_compra; ?></td>
                                <td><?php echo $dato->sugerencia; ?></td>
                                <td><a class="text-success" href="editar.php?id_opinion=<?php echo $dato->id_opinion; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id_opinion=<?php echo $dato->id_opinion; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">ID_Cliente: </label>
                        <input type="number" class="form-control" name="num_id_cliente" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Opinion: </label>
                        <input type="date" class="form-control" name="fecha" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calificacion del trato que se le dio: </label>
                        <input type="number" class="form-control" name="cali" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Queja: </label>
                        <input type="text" class="form-control" name="txtqueja" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">El por que de la queja: </label>
                        <input type="text" class="form-control" name="txtpq" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sucursal donde se le atendio: </label>
                        <input type="text" class="form-control" name="txtsucu" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sugerencia: </label>
                        <input type="text" class="form-control" name="txtsug" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                    <br><br><br>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
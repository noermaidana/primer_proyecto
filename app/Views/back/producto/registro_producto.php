<div class="container row align-items-center">
    <div class="col"></div>
    <div class="container mt-5 col">
        <div class="col-md mx-auto">
            <div class="card" style="width: 120%"; >
                <div class="card-header text-center">
                    <h4 class="mb-4 p-2" style="border: 2px solid #f8fcff;
                    background-color: #ffcef4;">
                        Agregar Producto
                    </h4>
                </div>

                <!--Si los campos no estan vacios y hay error, con "getFlasdata" no tira un msj de error-->
                <!--El producto no pudo ser registrado-->
                <?php if (!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif; ?>
                 <!--Si los campos no estan vacios y no hay error, con "getFlasdata" no tira un msj de exito-->
                <!--El producto fue agregado con exito-->
                <?php if (!empty(session()->getFlashdata('success'))): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif; ?>
                
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                <!--Formulario por método Post: los datos no se van a ver en la navbar-->
                <!--en el "action" se indica donde van a ser procesados esos datos-->
                    <form method="post" action="<?php echo base_url('/enviar-producto') ?>">
                        <?= csrf_field(); ?>

                        <div class="mb-3">
                            <label for= "nombreInput" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombreInput" name="nombre" 
                            placeholder="Nombre del Producto">
                            <!-- Error de campo Nombre-->
                            <?php if ($validation->getError('nombre')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('nombre'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <label for="precioInput" class="form-label">Precio</label>
                            <input type="text" class="form-control" id="precioInput" name="precio" 
                            placeholder="Precio sin signo $">
                            <!-- Error de campo Precio-->
                            <?php if ($validation->getError('precio')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('precio'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <label for="stockInput" class="form-label">Stock</label>
                            <input type="text" class="form-control" id="stocklInput" name="stock" 
                            placeholder="Stock">
                            <!-- Error de campo Stock-->
                            <?php if ($validation->getError('stock')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('stock'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Agregar" class="btn btn-success">
                            <a href="<?php echo base_url('/'); ?>" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
<div class="container align-items-center">
    <div class="col"></div>
    <div class="container mt-5 col">
        <div class="col-md mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-4 p-2" style="border: 2px solid #f8fcff;
                    background-color: #ffcef4;">
                        Consultas
                    </h4>
                </div>

                <!--Si los campos no estan vacios y hay error, con "getFlasdata" no tira un msj de error-->
                <!--El usuario no pudo ser registrado-->
                <?php if (!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif; ?>
                 <!--Si los campos no estan vacios y no hay error, con "getFlasdata" no tira un msj de exito-->
                <!--La consulta fue registrada con exito-->
                <?php if (!empty(session()->getFlashdata('success'))): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif; ?>
                
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                <!--Formulario por método Post: los datos no se van a ver en la navbar-->
                <!--en el "action" se indica donde van a ser procesados esos datos-->
                    <form method="post" action="<?php echo base_url('/enviar-consulta') ?>">
                        <?= csrf_field(); ?>

                        <div class="mb-3">
                            <label for= "nombreInput" class="form-label">Nombre y Apellido</label>
                            <input type="text" class="form-control" id="nombreInput" name="nombre" 
                            placeholder="Nombre y Apellido">
                            <!-- Error de campo Nombre-->
                            <?php if ($validation->getError('nombre')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('nombre'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Email de Contacto</label>
                            <input type="email" class="form-control" id="emailInput" name="email" 
                            placeholder="example@gmail.com">
                            <!-- Error de campo Email-->
                            <?php if ($validation->getError('email')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('email'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <label for="motivoInput" class="form-label">Motivo de Consulta</label>
                            <input type="text" class="form-control" id="motivoInput" name="motivo" 
                            placeholder="Motivo de Consulta">

                        <div class="mb-3">
                            <label for="descripcionInput" class="form-label">Mensaje</label>
                            <input type="text" class="form-control" id="descripcionInput" name="descripcion" 
                            placeholder="Lo que desea saber">
        
                        <div class="mb-3">
                            <input type="submit" value="Consultar" class="btn btn-success">
                            <a href="<?php echo base_url('/'); ?>" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
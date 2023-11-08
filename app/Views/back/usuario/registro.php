<div class="container row align-items-center">
    <div class="col"></div>
    <div class="container mt-5 col">
        <div class="col-md mx-auto">
            <div class="card" style="width: 120%"; >
                <div class="card-header text-center">
                    <h4 class="mb-4 p-2" style="border: 2px solid #f8fcff;
                    background-color: #ffcef4;">
                        Registrar usuario
                    </h4>
                </div>

                <!--Si los campos no estan vacios y hay error, con "getFlasdata" no tira un msj de error-->
                <!--El usuario no pudo ser registrado-->
                <?php if (!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif; ?>
                 <!--Si los campos no estan vacios y no hay error, con "getFlasdata" no tira un msj de exito-->
                <!--El usuario fue registrado con exito-->
                <?php if (!empty(session()->getFlashdata('success'))): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif; ?>
                
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                <!--Formulario por método Post: los datos no se van a ver en la navbar-->
                <!--en el "action" se indica donde van a ser procesados esos datos-->
                    <form method="post" action="<?php echo base_url('/enviar-form') ?>">
                        <?= csrf_field(); ?>

                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreInput" name="nombre" 
                            placeholder="Nombre">
                            <!-- Error de campo Nombre -->
                            <?php if ($validation->getError('nombre')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('nombre'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <label for="apellidoInput" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellidoInput" name="apellido" 
                            placeholder="Apellido">
                            <!-- Error de campo Apellido -->
                            <?php if ($validation->getError('apellido')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('apellido'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Email</label>
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
                            <label for="usuarioInput" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuarioInput" name="usuario" 
                            placeholder="Usuario">
                            <!-- Error de campo Usuario-->
                            <?php if ($validation->getError('usuario')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('usuario'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="passwordInput" name="pass" 
                            placeholder="Contraseña (mínimo 5 caracteres)">
                            <!-- Error de campo Pass-->
                            <?php if ($validation->getError('pass')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('pass'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            <a href="<?php echo base_url('/'); ?>" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
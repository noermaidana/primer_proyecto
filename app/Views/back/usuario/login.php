<div class="container row align-items-center">
    <div class="col"></div>
    <div class="container mt-5 col">
        <div class="col-md mx-auto">
            <div class="card" style="width: 120%";>
                <div class="card-header text-center">
                    <h4 class="mb-4 p-2" style="border: 2px solid #f8fcff; 
                    background-color: #ffcef4;">Iniciar Sesión</h4>
                </div>

                    <!-- Mensaje de error -->
                    <?php if(session()->getFlashdata('msg')): ?>
                    <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Inicio del formulario de login -->
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('/enviarlogin') ?>">
                            <div class="mb-3">
                            <label for="emailInput" class="form-label">Email</label>
                            <input type="text" class="form-control" id="emailInput" name="email" 
                            placeholder="example@gmail.com">
                            </div>

                            <div class="mb-3">
                            <label for="passwordInput" class="col-form-label-md">Contraseña</label>
                            <input type="password" class="form-control" id="passwordInput" name="pass" 
                            placeholder="Contraseña">
                            </div>

                            <input type="submit" value="Ingresar" class="btn btn-success">
                            <a href="<?php echo base_url('/login'); ?>" 
                            class="btn btn-danger">Cancelar</a>
                            <br><span>¿Aún no se ha registrado? 
                            <a href="<?php echo base_url('/registro'); ?>"
                            >Registrarse aquí</a></span>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
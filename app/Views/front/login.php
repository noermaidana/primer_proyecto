<div class="container row aling-items">
<div class="col"></div>
<div class="container mt-5 col ">
            <div class="col-md- mx-auto">
                <div class="card">
                        <div class="card-header text-center">
                        <h4 class="mb-4 p-2" style="border: 2px solid #f8fcff; 
                        background-color: #ffcef4;">Iniciar sesión</h4>
                    </div>
                </div>
            </div>
    <form>
        <div class="mb-3">
                <label for="correoInput" class="col-form-label-md">Correo</label>
                <input type="text" class="form-control" id="correoInput" 
                placeholder="Correo">
        </div>


            <div class="mb-3">
                <label for="passwordInput" class="col-form-label-md">Contraseña</label>
                <input type="password" class="form-control" id="passwordInput" 
                placeholder="Contraseña">
            </div>


        <button type="Ingresar" class="btn btn-success">Ingresar</button>
        <button type="Cancelar" class="btn btn-danger">Cancelar</button>
    </form>
        <p class="text-center mt-3">
            ¿Aún no se ha registrado? 
            <a href="<?php echo base_url('/registro')?>">Regístrese aquí</a>
        </p>
</div>
<div class="col"></div>
</div>
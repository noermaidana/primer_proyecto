<div class="container row ">
<div class="col"></div>
<div class="container col mt-5 mb-2">
            <div class="col-md- mx-auto">
                <div class="card">
                        <div class="card-header text-center">
                        <h4 class="mb-4 p-2"
                        style= "border: 2px solid #f8fcff;background-color: #ffcef4;">
                        Registrar usuario
                        </h4>
                        </div>
                </div>
            </div>
    <!--validacion-->
    <?php $validation = \Config\Services::validation(); ?>
    <form method='post' action="<?php echo base_url('/enviar-form')?> ">
        <?=csrf_field();?>
        <?=csrf_field();?>
        <?php if(!empty (session()->getFlashdata('fail'))):?>
        <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
            <?php endif?>
                <?php if(!empty (session()->getFlashdata('success'))):?>
            <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
            <?php endif?>
        <divm class="card-body justify-content-center" media="(max-width:768px)">
        

        <div class="mb-3">
                <label for="nombreInput" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombreInput"
                placeholder="Nombre">
                <!--Error-->
                <?php if($validation->getError('nombre')){?>
                    <div class="alert alert-danger mt-2">
                        <?= $error = $validation->getError('nombre');?>
                <?php }?>
            </div>


            <div class="mb-3">
                <label for="apellidoInput" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="apellidoInput"
                placeholder="Apellido">
                <!--Error-->
                <?php if($validation->getError('apellido')){?>
                    <div class="alert alert-danger mt-2">
                        <?= $error = $validation->getError('apellido');?>
                <?php }?>
            </div>


        <div class="mb-3">
            <label for="emailInput" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="emailInput" 
            placeholder="Email">
            <!--Error-->
            <?php if($validation->getError('email')){?>
                    <div class="alert alert-danger mt-2">
                        <?= $error = $validation->getError('email');?>
            <?php }?>
        </div>


        <div class="mb-3">
            <label for="usuarioInput" class="form-label">Usuario</label>
            <input type="text" name="usuario" class="form-control" id="usuarioInput" 
            placeholder="Usuario">
            <!--Error-->
            <?php if($validation->getError('usuario')){?>
                    <div class="alert alert-danger mt-2">
                        <?= $error = $validation->getError('usuario');?>
            <?php }?>
        </div>


        <div class="mb-3">
            <label for="passwordInput" class="form-label">Contraseña</label>
            <input type="password" name="pass" class="form-control" id="passwordInput" 
            placeholder="Contraseña (mínimo 5 caracteres)">
            <!--Error-->
            <?php if($validation->getError('pass')){?>
                    <div class="alert alert-danger mt-2">
                        <?= $error = $validation->getError('pass');?>
            <?php }?>
           
        </div>
 

        <button type="Ingresar" class="btn btn-success">Guardar</button>
        <button type="Cancelar" class="btn btn-danger">Cancelar</button>
    
    </form>
</div>      
</div>
<div class="col-3"></div>
</div>
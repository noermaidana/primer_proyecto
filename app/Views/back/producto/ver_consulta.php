<div class="table-responsive">
  <table class="table">
    <thead>
      <tr class="bg-dark bg-gradient">
        <th scope="col">N° de consulta</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Motivo</th>
        <th scope="col">Descripción</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require('stock_controller.php');
      $conexion=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
      if(!$conexion) die ('Error al conectar al servidor'.mysql_error());
      $acentos = mysqli_query($conexion, "SET NAMES 'utf8'");
      $sql = "SELECT * FROM consultas";
      $resultado = mysqli_query($conexion, $sql) or die ("Error en la consulta".mysql_error());
      while($registro=mysqli_fetch_array($resultado)){
      ?>
      <tr>
        <th scope="row"><?php echo $registro['id_consulta']; ?></th>
        <td><?php echo $registro['nombre']; ?></td>
        <td><?php echo $registro['email']; ?></td>
        <td><?php echo $registro['motivo']; ?></td>
        <td><?php echo $registro['descripcion']; ?></td>
      </tr>
    </tbody>
  <?php }?>
  </table>
</div>
     
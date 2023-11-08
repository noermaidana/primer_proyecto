<div class="table-responsive">
  <table class="table">
    <thead>
      <tr class="bg-dark bg-gradient">
        <th scope="col">Nombre del Producto</th>
        <th scope="col">Precio ($)</th>
        <th scope="col">Unidades Disponibles</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require('datos.php');
      $conexion=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
      if(!$conexion) die ('Error al conectar al servidor'.mysql_error());
      $acentos = mysqli_query($conexion, "SET NAMES 'utf8'");
      $sql = "SELECT * FROM productos";
      $resultado = mysqli_query($conexion, $sql) or die ("Error en la consulta".mysql_error());
      while($registro=mysqli_fetch_array($resultado)){
      ?>
      <tr>
        <th scope="row"><?php echo $registro['nombre']; ?></th>
        <td><?php echo $registro['precio']; ?></td>
        <td><?php echo $registro['stock']; ?></td>
      </tr>
    </tbody>
  <?php }?>
  </table>
</div>
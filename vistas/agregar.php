<?php
include("hoteles.html");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM medico WHERE id_medico=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $especializacion = $row['especializacion'];
   
    
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $especializacion = $_POST['especializacion'];
  
  $query = "UPDATE medico set nombre = '$nombre' , apellido= '$apellido' ,  especializacion = '$especializacion' WHERE id_medico = '$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Datos actualizados correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: indexmedico.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editarmedico.php?id=<?php echo $_GET['id']; ?>" method="POST">

        <div class="form-group">
        <label for="">Nombre</label>
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title">
        </div>


        <div class="form-group">
        <label for="">Apellido</label>
          <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <label for="">Especializacion</label>
          <input name="especializacion" type="text" class="form-control" value="<?php echo $especializacion; ?>" placeholder="Update Title">
        </div>



        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
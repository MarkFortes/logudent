<?php
  //Imports the necessary classes
  require_once("models/Connection.php");
  require_once("models/UsersManagament.php");

  //Checks if the user has logged recently. If so, it will be redirected to home
  session_start();
  if (isset($_SESSION["id_user"])) {
    $id_user = $_SESSION["id_user"];
    $conn = new Connection();
    $role = UsersManagament::getRole($conn, $id_user);
    if ($role == 1) { //role = 1 -> profesor
      header("Location:homeTeacher.php");
    }else if ($role == 0) { //role = 0 -> alumno
      header("Location:homeStudent.php");
    }
  }
?>

<?php
  //Imports the header
  require_once("layouts/headerUnlogged.php");
?>

<div class="container" id="login-container">
  <div class="row">
    <div class="col-md-12">
      <form action="controllers/validateUserController.php" method="post">
        <div class="form-group">
          <label>Correo electrónico</label>
          <input type="email" class="form-control" name="txtEmail" required>
        </div>
        <div class="form-group">
          <label>Contraseña</label>
          <input type="password" class="form-control" name="txtPassword" required>
        </div>
        <div class="form-group">
            <p><a href="#">¿Has olvidado tu contraseña?</a></p>
        </div>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary" name="btnValidate">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
  require_once("layouts/footer.php");
?>

<?php
  //Checks if the user has logged recently. If not, it will be redirected to index
  session_start();
  if (!isset($_SESSION["id_user"])) {
    header("Location:index.php");
  }
?>

<?php
  //Imports the header
  require_once("layouts/headerLoggedStudent.php");
  require_once("models/UsersManagament.php");
?>

<div class="container" id="home-container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <h3>Este es tu registro de jornada</h3>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Entrada</th>
                <th scope="col">Salida</th>
              </tr>
            </thead>
            <tbody>
              <?php include_once("controllers/showRecordsController.php"); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  //Imports the footer
  require_once("layouts/footer.php");
?>

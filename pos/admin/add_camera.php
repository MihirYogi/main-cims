<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
//Add Staff
if (isset($_POST['addcamera'])) {

  if (empty($_POST["camera_make"]) || empty($_POST["serial_number"]) || empty($_POST['ins_date']) || empty($_POST['ex_date']) || empty($_POST['location']) || empty($_POST['location_image'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $camera_make = $_POST['camera_make'];
    $serial_number = $_POST['serial_number'];
    $ins_date = $_POST['ins_date'];
    $ex_date = $_POST['ex_date'];
    $ex_date = $_POST['location'];
    $ex_date = $_POST['location_image'];

    $postQuery = "INSERT INTO main_cims (camera_make, serial_number, ins_date, ex_date, location, location_image) VALUES(?,?,?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);

    $rc = $postStmt->bind_param('ssssss', $camera_make, $serial_number, $ins_date, $ex_date, $location, $location_image);
    $postStmt->execute();

    if ($postStmt) {
      $success = "Camera Added" && header("refresh:1; url=camera.php");
    } else {
      $err = "Please Try Again Or Try Later";
    }
  }
}
require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3>Please Fill All Fields</h3>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>camera make</label>
                    <input type="text" name="staff_number" class="form-control" value="<?php echo $alpha; ?>-<?php echo $beta; ?>">
                  </div>
                  <div class="col-md-6">
                    <label>serial_number</label>
                    <input type="text" name="staff_name" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>ins date</label>
                    <input type="email" name="staff_email" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>ex_date</label>
                    <input type="password" name="staff_password" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>location</label>
                    <input type="password" name="staff_password" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>location_image</label>
                    <input type="password" name="staff_password" class="form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addStaff" value="Add Staff" class="btn btn-success" value="">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>
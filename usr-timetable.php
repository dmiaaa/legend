<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid = $_SESSION['u_id'];

  // Handle category filter
  $selectedCategory = $_GET['category'] ?? ''; // Get selected category (if any)
  $categories = array(); // An array to store unique categories

  // Fetch unique categories from the database
  $categoryQuery = "SELECT DISTINCT v_category FROM tms_vehicle";
  $categoryStmt = $mysqli->prepare($categoryQuery);
  $categoryStmt->execute();
  $categoryRes = $categoryStmt->get_result();

  while ($categoryRow = $categoryRes->fetch_assoc()) {
    $categories[] = $categoryRow['v_category'];
  }
?>
<!DOCTYPE html>
<html lang="en">

<!--Head-->
<?php include('vendor/inc/head.php'); ?>
<!--End Head-->

<body id="page-top">
  <!--Navbar-->
  <?php include('vendor/inc/nav.php'); ?>
  <!--End Navbar-->

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('vendor/inc/sidebar.php'); ?>
    <!--End Sidebar-->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="user-dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Timetable</li>
        </ol>

        <!-- Category Filter -->
        <div class="form-group">
          <label for="categorySelect">Select Timetable:</label>
          <form action="" method="GET">
            <select name="category" id="categorySelect" class="form-control" onchange="this.form.submit()">
              <option value="">All Timetables</option>
              <?php
              foreach ($categories as $category) {
                $selected = ($selectedCategory == $category) ? 'selected' : '';
                echo "<option value='$category' $selected>$category</option>";
              }
              ?>
            </select>
          </form>
        </div>

        <div class="card mb-3">
          <div class="card-header">
            <?php
            $query = "SELECT * FROM tms_vehicle";
            
            // Add category filter to the query
            if (!empty($selectedCategory)) {
              $query .= " WHERE v_category = ?";
            }

            $query .= " ORDER BY v_id ASC";

            $stmt = $mysqli->prepare($query);

            if (!empty($selectedCategory)) {
              $stmt->bind_param("s", $selectedCategory);
            }

            $stmt->execute();
            $res = $stmt->get_result();
            $cnt = 1;
            while ($row = $res->fetch_object()) {
            ?>
              <!-- Project One -->
              <div class="row">
                <div class="col-md-6">
                  <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="vendor/img/<?php echo $row->v_dpic; ?>" alt="">
                  </a>
                </div>
                <div class="col-md-5">
                  <h3><?php echo $row->v_category; ?></h3>
                  <ul class="list-group list-group-horizontal">
                    <li class="list-group-item"><?php echo $row->v_pass_no; ?></li>
                    <li class="list-group-item"><?php echo $row->v_name; ?></li>
                    <li class="list-group-item"><?php echo $row->v_reg_no; ?></li>
                    <li class="list-group-item"><span class="badge badge-success">Completed</span></li>
                  </ul><br>
                </div>
              </div>

              <!-- /.row -->
              <hr>
            <?php } ?>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div>

  <!-- /.container-fluid -->

  <!-- Sticky Footer -->
  <?php include("vendor/inc/footer.php"); ?>


  <!-- /.content-wrapper -->

  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="user-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>

</body>

</html>

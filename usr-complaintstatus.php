<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid = $_SESSION['u_id'];

if (isset($_POST['f_location'])) {
    $selectedLocation = $_POST['f_location'];
} else {
    $selectedLocation = ""; // Default: Show all locations
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
                    <li class="breadcrumb-item">Complaint</li>
                    <li class="breadcrumb-item active">Complaint Status</li>
                </ol>

                <h2 class="my-3">User Complaints Status</h2>

                <!-- Location Selection Form -->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Location:</label>
                        <select class="form-control" name="f_location" id="exampleInputEmail1">
                            <option value="">All Locations</option>
                            <!-- Add options for different locations from your database -->
                            <?php
                            $locationQuery = "SELECT DISTINCT f_location FROM tms_feedback";
                            $locationResult = $mysqli->query($locationQuery);
                            while ($row = $locationResult->fetch_assoc()) {
                                $f_location = $row['f_location'];
                                echo "<option value=\"$f_location\"";
                                if ($selectedLocation === $f_location) {
                                    echo " selected";
                                }
                                echo ">$f_location</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form><br>
                
                
                <div class="card mb-4">
                
                    <table class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th>User Name</th>
                                <th>Location</th>
                                <th>Complaint Content</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <?php
                            $filter = $selectedLocation ? "WHERE f_location = ?" : "";
                            $query = "SELECT * FROM `tms_feedback` $filter";
                            $stmt = $mysqli->prepare($query);
                            if ($selectedLocation) {
                                $stmt->bind_param("s", $selectedLocation);
                            }
                            $stmt->execute();
                            $res = $stmt->get_result();
                            while ($row = $res->fetch_object()) {
                                echo "<tr>";
                                echo "<td>" . $row->f_uname . "</td>";
                                echo "<td>" . $row->f_location . "</td>";
                                echo "<td>" . $row->f_content . "</td>";
                                 echo "<td>" . $row->f_status . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                
                

            </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include("vendor/inc/footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

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

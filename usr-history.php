<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid = $_SESSION['u_id'];

// Calculate the date 6 months ago from the current date
$startDate = date('Y-m-d', strtotime('-6 months'));

// Check if the user has submitted the form with a selected month
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_month"])) {
    $selectedMonth = $_POST["selected_month"];
    // Query to fetch bookings for the selected month
    $ret = "SELECT * FROM tms_user WHERE u_car_book_status IN ('Approved', 'Pending') AND MONTH(u_car_bookdate) = ? AND u_car_bookdate >= ?";
    $stmt = $mysqli->prepare($ret);
    $stmt->bind_param("ss", $selectedMonth, $startDate);
    $stmt->execute();
    $res = $stmt->get_result();
} else {
    // Default query to fetch all bookings for the past 6 months
    $ret = "SELECT * FROM tms_user WHERE u_car_book_status IN ('Approved', 'Pending') AND u_car_bookdate >= ?";
    $stmt = $mysqli->prepare($ret);
    $stmt->bind_param("s", $startDate);
    $stmt->execute();
    $res = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("vendor/inc/head.php");?>

<body id="page-top">
    <!--Start Navigation Bar-->
    <?php include("vendor/inc/nav.php");?>
    <!--Navigation Bar-->

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("vendor/inc/sidebar.php");?>
        <!--End Sidebar-->
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="user-dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">History</li>
                </ol>

                <!-- View Booking History -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Booking History
                    </div>
                    <div class="card-body">
                        <!-- Form to select the month -->
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <label for="selected_month">Select a Month:</label>
                                <select name="selected_month" id="selected_month" class="form-control">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <button type="submit" name="search_month" class="btn btn-primary">Search</button>
                            <p></p>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Location</th>
                                        <th>No Phone</th>
                                        <th>Booking date</th>
                                        <th>Start Booking Time</th>
                                        <th>End Booking time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $cnt = 1;
                                    while ($row = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row->u_fname; ?> <?php echo $row->u_lname; ?></td>
                                            <td><?php echo $row->u_phone; ?></td>
                                            <td><?php echo $row->u_car_type; ?></td>
                                            <td><?php echo $row->u_car_regno; ?></td>
                                            <td><?php echo $row->u_car_bookdate; ?></td>
                                            <td><?php echo $row->u_startbooktime; ?></td>
                                            <td><?php echo $row->u_endbooktime; ?></td>
                                            <td><?php if ($row->u_car_book_status == "Pending") {
                                                echo '<span class="badge badge-warning">' . $row->u_car_book_status . '</span>';
                                            } else {
                                                echo '<span class="badge badge-success">' . $row->u_car_book_status . '</span>';
                                            } ?></td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <?php include("vendor/inc/footer.php"); ?>
        </div>
        <!-- /.content-wrapper -->
    </div>
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

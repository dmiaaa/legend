<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid = $_SESSION['u_id'];
?>

<!DOCTYPE html>
<html lang="en">
<?php include("vendor/inc/head.php");?>

<body id="page-top">
    <!-- Start Navigation Bar -->
    <?php include("vendor/inc/nav.php"); ?>
    <!-- Navigation Bar -->

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("vendor/inc/sidebar.php"); ?>
        <!-- End Sidebar -->
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="user-dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Cleaner Contact</li>
                </ol>

                <!-- Cleaner Contact Information -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-user"></i>
                        Cleaner Contact Information
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Cleaner's Name</h2>
                        <table align="center">
                        <br>
                        <tr>
                            <td align="center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Unknown_person.jpg/694px-Unknown_person.jpg" width="200" height="250">
                            </td>
                            <td align="center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Unknown_person.jpg/694px-Unknown_person.jpg" width="200" height="250">
                            </td>
                            <td align="center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Unknown_person.jpg/694px-Unknown_person.jpg" width="200" height="250">
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <strong>Zubaidah binti Ahmad</strong>
                                <br>
                                <a href="whatsapp://send?phone=PHONE_NUMBER"><i class="fab fa-whatsapp mr-2" style="font-size:36px"></i></a>
                                <a href="tel:+1234567890"><i class="fas fa-phone" style="font-size:32px"></i></a>
                            </td>

                            <td align="center">
                                <strong>Ramona binti Zaki</strong>
                                <br>
                                <a href="whatsapp://send?phone=PHONE_NUMBER"><i class="fab fa-whatsapp mr-2" style="font-size:36px"></i></a>
                                <a href="tel:+1234567890"><i class="fas fa-phone" style="font-size:32px"></i></a>
                            </td>

                            <td align="center">
                                <strong>Sajat binti Eh</strong>
                                <br>
                                <a href="whatsapp://send?phone=PHONE_NUMBER"><i class="fab fa-whatsapp mr-2" style="font-size:36px"></i></a>
                                <a href="tel:+1234567890"><i class="fas fa-phone" style="font-size:32px"></i></a>
                            </td>

                        </tr>

                    </table>
                        
                        
                        
                        
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

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
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
                <div class "modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="user-logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="vendor/js/sb-admin.min.js"></script>
</body>
</html>

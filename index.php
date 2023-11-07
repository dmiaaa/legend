<?php
    session_start();
    include('vendor/inc/config.php');//get configuration file
    if(isset($_POST['Usr-login']))
    {
      $u_email=$_POST['u_email'];
      $u_pwd=($_POST['u_pwd']);//
      $stmt=$mysqli->prepare("SELECT u_email, u_pwd, u_id FROM tms_user WHERE u_email=? and u_pwd=? ");//sql to log in user
      $stmt->bind_param('ss',$u_email,$u_pwd);//bind fetched parameters
      $stmt->execute();//execute bind
      $stmt -> bind_result($u_email,$u_pwd,$u_id);//bind result
      $rs=$stmt->fetch();
      $_SESSION['u_id']=$u_id;//assaign session to user id
      $_SESSION['login']=$u_email;
      $uip=$_SERVER['REMOTE_ADDR'];
      $ldate=date('d/m/Y h:i:s', time());
      if($rs)
      {//get user logs
        $uid=$_SESSION['u_id'];
        $uemail=$_SESSION['login'];
        $ip=$_SERVER['REMOTE_ADDR'];
        $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
        $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
        $city = $addrDetailsArr['geoplugin_city'];
        $country = $addrDetailsArr['geoplugin_countryName'];
       
        
         header("location:user-dashboard.php");
         }
        
      else
      {
      echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
      $error = "Access Denied Please Check Your Credentials";
      }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CleanConnect Pro - User Login</title>

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/css/sb-admin.css" rel="stylesheet">
    <link href="vendor/css/custom-login.css" rel="stylesheet">
</head>

<style>
    .btn-navy {
        background-color: navy;
        color: #fff;
    }

    .btn-navy:hover {
        background-color: darkblue;
    }

    .btn-round {
        border-radius: 25px;
        width: 50%;
    }

    /* Adjusted button width for larger screens */
    @media (min-width: 768px) {
        .btn-round {
            width: 40%;
        }
    }

</style>


<body class="bg-dark">

    <div class="card card-login mx-auto mt-5" style="color: white;">
        <div class="card-header text-center" style="background-color: darkblue;">
            <img src="img/logooccp.png" width="180px">
            <p>
                <i class="fas fa-user" style="color: white;"> </i> User Login
        </div>
        <div class="card-body">
            <!-- INJECT SWEET ALERT -->
            <?php if(isset($error)) {?>
            <script>
                setTimeout(function() {
                    swal("Failed!", "<?php echo $error;?>", "error");
                }, 100);

            </script>
            <?php } ?>
            <form method="POST">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <input type="email" name="u_email" id="inputEmail" class="form-control" required="required" autofocus="autofocus" placeholder="Email address">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" name="u_pwd" id="inputPassword" class="form-control" required="required" placeholder="Password">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="Usr-login" class="btn btn-navy btn-round">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </div>
            </form>
            <div class="text-center">
                <a class="d-inline-block small mt-3 mr-3" href="usr-register.php">
                    <i class="fas fa-user-plus"></i> Sign Up      
                </a>
                <a class="d-inline-block small" href="usr-forgot-password.php">
                    <i class="fas fa-key"></i> Forgot Password?
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Inject Sweet Alert JS -->
    <script src="vendor/js/swal.js"></script>
</body>

</html>

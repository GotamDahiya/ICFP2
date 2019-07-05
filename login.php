<?php
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  $error="";
  $userid="";
  $pwd="";
  $con=mysqli_connect('localhost','root','Orion@1234','project2') or die(mysqli_error());
  if ($_POST["SUBMIT"])
  {
    if (!$_POST["userid"]) 
    {       
        $error .= "A username is required.<br>";
        echo $error;
    }
    else
    {
      $userid=$_POST['userid'];
    }
    if (!$_POST["pwd"]) 
    {   
       $error .= "A password is required.<br>";
       echo $error;   
    }
    else
    {
      $pwd=$_POST['pwd'];
    }
    $query=mysqli_query($con,"SELECT * FROM user WHERE username='".$userid."' AND pwd='".$pwd."'");
    $numrows=mysqli_num_rows($query);
    if($numrows==1)
    {
        while($row=mysqli_fetch_assoc($query))
        {
            $rights=$row['rights'];
            $deptno=$row['deptno'];
        }
        switch($rights)
        {
            case 1:
                session_start();
                $_SESSION['sess_rights']=$rights;
                header("Location: admin.php");
                break;
            case 2:
                session_start();
                $_SESSION['sess_rights']=$rights;
                $_SESSION['sess_deptno']=$deptno;
                header("Location: hod.php");
                break;
            case 3:
                $_SESSION['sess_rights']=$rights;
                header("Location: dhod.php");
                break;
            case 4:
                $_SESSION['sess_rights']=$rights;
                header("Location: shop.php");
                break;
            default: echo "Invalid rights of user.";
        }
    }
    else
    {
        echo "Invalid username or password entered.<br>";
    }
  }
  $_SESSION=array();
  session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Integrated Management System &mdash; IMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="">IMS Portal</a></div>

<!--
          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                  <small style="color:white;">Haven't registered?</small>
                <li class="cta"><a href="register.html" class="nav-link"><span>Register</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
-->
        </div>
      </div>

    </header>

    <div class="intro-section" id="home-section">

      <div class="slide-1" style="background-image: url('images/Log.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Welcome to IMS Portal</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Log in and access your files.</p>

                </div>

                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4">Login</h3>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="User ID" name="userid">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="pwd">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="Login" name="SUBMIT">
                    </div>
                  </form>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


</div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>


  <script src="js/main.js"></script>

  </body>
</html>
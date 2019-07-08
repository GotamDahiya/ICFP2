<?php

session_start();
if(!isset($_SESSION['sess_rights']) || (time()-$_SESSION['last'])>600)
{
    header("Location: login.php");
}
$_SESSION['last']=time();
if($_POST['logout'])
{
  session_destroy();
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title> Connect upload MySQL</title>
</head>

<body>
<form method = "post">
    </form>

</body>
</html>


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
          <div class="ml-auto w-25">
            <form class="" method="post" action="">
              <div class="form-group">
                <input type="submit" class="btn btn-pill btn-danger" value="Logout" name="logout">
              </div>
            </form>
          </div>

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
                  <form action="" method="post" enctype = "multipart/form-data" class="form-box">
                    <?php
                      //echo "hi </br>";
                      if(isset($_POST['btn']))
                      {
                        $con=mysqli_connect("localhost","root","Orion@1234","project2");
                        $file=$_FILES['myfile']['tmp_name'];
                        $docname=$_POST['docname'];
                        $shop=$_SESSION['sess_shop'];
                        $deptno=$_SESSION['sess_deptno'];
                        $destination='/ICFP2/uploads/' . $docname;
                        if(move_uploaded_file($file,$destination))
                        {
                          $query=mysqli_query($con,"INSERT INTO documents VALUES ('".$deptno."','".$docname."','".$shop."')");
                          if($query)
                          {
                            echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
                          }
                          else
                          {
                            echo "<script type='text/javascrip't>alert('Not submitted!')</script>";
                          }
                        }
                        else
                        {
                            echo "<script type='text/javascript'>alert('Not uploaded!')</script>";
                        }
                      }
                    ?>
                    <input type="file" class="btn btn-pill" name ='myfile'/>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" placeholder="Shop Name" name="shop">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Department Number" name="deptno">
                    </div> -->
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Document Name" name="docname">
                    </div>
                    <button class="btn btn-primary btn-pill" name="btn">Upload File</button>
                    <br></br>
                  </form>
              </div>
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
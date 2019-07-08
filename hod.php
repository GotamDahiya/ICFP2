<?php  
  session_start();
  if(!isset($_SESSION["sess_rights"]) || (time()-$_SESSION['last'])>600)
  {
    header("Location: login.php");
  }
  $rights=$_SESSION['sess_rights'];
  $_SESSION['last']=time();
  if($rights>2)
  {
    switch ($rights) {
      case 3:
        $_SESSION['sess_rights']=$rights;
        header("Location: dhod.php");
        break;
      case 4:
        $_SESSION['sess_rights']=$rights;
        header("Location: shop.php");
        break;
      default: header("Location: login.php");
    }
  }
  // echo $rights;
  // echo "a ";
  // echo $_SESSION['sess_deptno'];
  // echo "b ";
  if($_POST['logout'])
  {
    session_destroy();
    header("Location: login.php");
  }
?>
<?php session_start(); ?>
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

      <div class="slide-1" style="background-image: url('images/mountain.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Head Of Department Page</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">List of Deputy Heads</p>

                </div>

                <div class="table-responsive">
                  <table class="table table-hover table-dark">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Department Name</th>
                        <th scope="col">Deputy Name</th>
                      </tr>                     
                    </thead>
                    <tbody>
                      <?php
                        if(isset($_POST['deptno']))
                        {
                          $deptno=$_POST['deptno'];
                          //echo "A";
                        }
                        else
                        {
                          $deptno=$_SESSION['sess_deptno'];
                          //echo "B";
                        }
                        //echo $deptno;
                        $con=mysqli_connect("localhost","root","Orion@1234","project2");
                        $query=mysqli_query($con,"SELECT DISTINCT senior FROM shop WHERE deptno=$deptno");
                        $query1=mysqli_query($con,"SELECT * FROM department WHERE deptno=$deptno");
                        $deptname=mysqli_fetch_assoc($query1);
                        $numrows=mysqli_num_rows($query);
                        if($numrows>0)
                        {
                          while($row=mysqli_fetch_assoc($query))
                          {
                            $user=$row['senior'];
                            $deptno=$deptname['deptno'];
                            echo "<td>".$deptname['deptname']."</td>";
                            //echo "<td><a href='dhod.php?senior=$user&deptno=$deptno'>".$row['senior']."</a></td>";
                            echo "<td>
                            <form action='/ICFP2/dhod.php' method='post'>
                              <input type='hidden' value=$user name=senior>
                              <input type='hidden' value=$deptno name=deptno>
                              <input type='submit' class='btn btn-primary btn-pill' value='".$row['senior']."' name='SENIOR'>
                            </form></td>";    
                            echo "</tr>";
                          }
                        }
                        else
                        {
                          echo "<h4>No deputy heads of departments</h4>";
                        }
                      ?>
                    </tbody>                    
                  </table>
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
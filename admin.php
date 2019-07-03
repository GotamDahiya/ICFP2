
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Administrator Page</title>
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

    <div class="intro-section" id="home-section">

      <div class="slide-1" style="background-image: url('images/Log.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-top">
            <div class="col-12">
              <div class="row align-items-top">
                <div class="col-lg-6">
                  <h1  data-aos="fade-up" data-aos-delay="100">Administrator Page</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">List of departments</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead class="thead=dark">
        <tr>
          <th scope="col">Department Number</th>
          <th scope="col">Department Name</th>
          <th scope="col">Link</th>
        </tr>
      </thead>
      <tbody>
      	<tr>
        <?php

			$con=mysqli_connect("localhost","root","Orion@1234","project2");
			$query=mysqli_query($con,"SELECT * FROM department");
			$numrows=mysqli_num_rows($query);
			if($numrows>0)
			{
				while($row=mysqli_fetch_assoc($query))
				{
					$deptname=$row['deptname'];
					echo "<td>".$row['deptno']."</td>";
					echo "<td>".$row['deptname']."<td>";
					$_SESSION['sess_deptname']=$deptname;
					echo "<td><a href='hod.php'>'".$row['deptname']."'</a></td>";
					echo "</tr>";
				}
			}
			else
			{
				echo "No departments";
			}
		?>
      </tbody>
    </table>
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
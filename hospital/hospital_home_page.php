<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<!doctype html>
<html lang="en">

<head>
  <title>Hospital Tracker Madurai City</title>
  <link rel="shortcut icon" href="https://image.flaticon.com/icons/png/512/3448/3448513.png">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
</head>
<body class="profile-page sidebar-collapse">
    <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
        <div class="container">
          <div class="navbar-translate">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="material-icons">person</i> <?php echo $user_data['hname']; ?>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="logout_page.php" class="nav-link">
                  <i class="material-icons">directions_walk</i> Logout
                </a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('https://image.freepik.com/free-photo/abstract-blur-beautiful-luxury-hospital-clinic-interior-background_103324-624.jpg');">
    <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h2 class='title text-center'><?php echo $user_data['name']; ?></h2>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="main main-raised">
  <div class = "container">
      <br>
    <h3 class="text-center title"> List of patients for Today</h3>
    <table class='table table-hover table-dark'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Patient Name</th>
                      <th scope='col'>Age</th>
                      <th scope='col'>Timings</th>
                    </tr>
                  </thead>


            <?php
            $sql = "SELECT username,age,timings,hospital,hadmin.hname FROM appointment JOIN hadmin on appointment.hospital = hadmin.hid" ;
            $result = $con->query($sql);
            $count=1;
            
            if ($result->num_rows > 0){
              while($row = $result->fetch_assoc()) 
              {
                if($user_data['hid']==$row["hospital"]){

                  if($row["timings"]== 9){
                    $time="9AM TO 11AM";
                  }
                  else if($row["timings"]== 11){
                    $time="11AM TO 1PM";
                  }
                  else if($row["timings"]== 5){
                    $time="5PM TO 7PM";
                  }
                  else{
                      $time="7PM TO 9PM";
                  }

                  echo "
                  <tbody>
                    <tr>
                    <th scope='row'>".$count."</th>
                    <td>". $row["username"]."</td>
                    <td>" . $row["age"]."</td>
                    <td> ". $time."</td>
                  </tr> </tbody>
                  ";
                  
                  ++$count;
                }
                else{
                  continue;
                }
              }
            }
            if($count ===1) 
            {
            echo "<h4 class='text-center title'>No Appointments Yet</h4>";
            }
       ?>

<!--End of Table-->
  </table>
  <br>
  </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
           <a href="#"> Know more about Us..</a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by Anandhalakshmi and Cathe.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   --></footer>
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script></footer>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script></footer>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script></footer>
  <script src="../assets/js/plugins/moment.min.js"></script></footer>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker --></footer>
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script></footer>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ --></footer>
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script></footer>
  <!--  Google Maps Plugin    --></footer>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc --></footer>
  <script src="../assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script></footer>
</body></footer>

</html></footer>
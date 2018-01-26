<!DOCTYPE html>
<html>
<head>
	<title>Musette</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="icon.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/theme.js"></script>
  <script src="js/validate-form.js"></script>
  <script src="js/iframe.js"></script>
</head>
<body>
<div class="container-fluid">
	<nav class="navbar navbar-default navbar-fixed-top" id="header">
	<img src="logo.png" alt="logo" id="logo">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MUSETTE</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
          	  <li>
          	  	<form class="navbar-form navbar-left">
            		<input type="text" class="form-control" placeholder="Search...">
          		</form>
          	  </li>
              <li class="dropdown" id="theme">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Theme
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li onclick="changeDefault()"><a href="#">Default</a></li>
                    <li onclick="changeMidnightBlack()"><a href="#">Midnight Black</a></li>
                    <li onclick="changeRed()"><a href="#">Royal Red</a></li>
                    <li onclick="changeBlue()"><a href="#">Blue</a></li>
                    <li onclick="changeCyan()"><a href="#">Cyan</a></li>
                    <li onclick="changeAuto()"><a href="#">Choose</a></li>
                  </ul>
              </li>
              <li id="theme" data-toggle="modal" data-target="#popUpWindow"><a href="#"><span class="glyphicon glyphicon-log-in"></span> LogIn</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
</div>
<div id="popUpWindow" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 align="center" style="color:green" class="modal-title">LogIn</h3>
      </div>
      <!--Body-->
      <div class="modal-body">
        <form onsubmit="return checklogin()" action="php/login.php" role="form" method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="usrname" name="usrname" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="Password" class="form-control" id="pwrd" name="pwrd" placeholder="Password">
          </div>
          <div class="form-group">
            <label>Account</label>
            <select class="form-control" name="account-type">
              <option value="User">User</option>
              <option value="Artist">Artist</option>
            </select>
          </div>
          <div class="form-group">
            <input type="checkbox" value="1" checked><label> Remember me</label>
          </div>
          <div class="form-group">
            <input type="submit" class="form-control btn-success" value="LOG IN">
          </div>
        </form>
        <a href="#">Forgot your password?</a></td>
      </div>
      <!--Footer-->
      <div class="modal-footer">
      <h2 align="center" class="text-primary">Signup</h2>
        <form action="php/checksignup.php" role="form" method="post">
          <div class="form-group">
            <h4 align="left">Account</h4>
            <select class="form-control" name="account-type">
              <option value="User">User</option>
              <option value="Artist">Artist</option>
            </select>
          </div>
            <div class="form-group">
              <input type="submit" class="form-control btn-primary" value="SIGN UP">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--begins the body-->
<div class="jumbotron container-fluid">
    <div class="col-sm-3">
      <div class="artist-p">
        <h2 align="center" style="background:#B0E0E6;"><strong>POPULAR ARTISTS</strong></h2>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "musette";
        $i=1;
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql= 'SELECT * FROM artist';
        $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          {    
              while($row = $result->fetch_assoc())
                 {
                  echo " <a href='#'><li data-toggle='modal' data-target='#myModal".$i."' align='center'><strong> ".$row['First Name']." ".$row['Middle Name']." ".$row['Last Name']."</strong></li></a>";
                  echo " 
                      <div class='modal fade' id='myModal".$i."' role='dialog'>
                        <div class='modal-dialog modal-lg'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <button type='button' class='close' data-dismiss='modal'>&times;</button>
                           
                            </div>
                            <div class='modal-body'>
                              <div class='img' align='center'>
                                <img class= 'img-rounded' src='upload/profile/".$row['Username'].".jpg' height='100px' width='100px'>
                                <h2 align='center'style='background:#B0E0E6;'>ARTIST DETAILS</h2>
                                <table align='center' style='font-size: 20px; color:Black;'>
                      ";

                     echo "<tr><td><strong> Name:</strong> ".$row['First Name']." ".$row['Middle Name']." ".$row['Last Name']."</td></tr><tr><td><strong>Address:</strong> ".$row['Address']."</td></tr><tr><td><strong>D.O.B:</strong> ".$row['D.O.B']."</td></tr><tr><td><strong>Gender:</strong> ".$row['Gender']."</td></tr><tr><td><strong>Avaialble Time:</strong> ".$row['AvailableFrom']." to ".$row['AvailableTo']."</td></tr><tr><td><strong>Rate Per Hour:</strong> Rs ".$row['Rate']." |-</td></tr>";
       echo "</table>
          </div>
        </div>
      </div>
    </div>
  </div>
";

                  echo "<br>";
$i++;
                 }
          }
?>
      </div>
      <div class="artist-f">
        <h2 align="center" style="background:#B0E0E6;"><strong>FEATURED ARTISTS</strong></h2>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "musette";
        $i=1;
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql= 'SELECT * FROM artist';
        $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          {    
              while($row = $result->fetch_assoc())
                 {
                  echo " <a href='#'><li data-toggle='modal' data-target='#myModal".$i."' align='center'><strong> ".$row['First Name']." ".$row['Middle Name']." ".$row['Last Name']."</strong></li></a>";
                  echo " 
                      <div class='modal fade' id='myModal".$i."' role='dialog'>
                        <div class='modal-dialog modal-lg'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <button type='button' class='close' data-dismiss='modal'>&times;</button>
                           
                            </div>
                            <div class='modal-body'>
                              <div class='img' align='center'>
                                <img class= 'img-rounded' src='upload/profile/".$row['Username'].".jpg' height='100px' width='100px'>
                                <h2 align='center'style='background:#B0E0E6;'>ARTIST DETAILS</h2>
                                <table align='center' style='font-size: 20px; color:Black;'>
                      ";

                     echo "<tr><td><strong> Name:</strong> ".$row['First Name']." ".$row['Middle Name']." ".$row['Last Name']."</td></tr><tr><td><strong>Address:</strong> ".$row['Address']."</td></tr><tr><td><strong>D.O.B:</strong> ".$row['D.O.B']."</td></tr><tr><td><strong>Gender:</strong> ".$row['Gender']."</td></tr><tr><td><strong>Avaialble Time:</strong> ".$row['AvailableFrom']." to ".$row['AvailableTo']."</td></tr><tr><td><strong>Rate Per Hour:</strong> Rs ".$row['Rate']." |-</td></tr>";
       echo "</table>
          </div>
        </div>
      </div>
    </div>
  </div>
";

                  echo "<br>";
$i++;
                 }
          }
?>
      </div>   
    </div>
    <div class="col-sm-9">
        <div class="iframe" style="margin: 0 auto;width:100%">
          <iframe id="ifrm" src="php/video.php" onload="setIframeHeight(this.id)" style="width:100%;border: none;"></iframe>
        </div>      
    </div>       
</div>
</body>
</html>


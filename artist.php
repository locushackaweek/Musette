<?php
  session_start();
  $uname=$_SESSION["username"];
  if (empty($uname))
  {
    header('location: index.php');
  }
?>
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
  <link rel="stylesheet" type="text/css" href="css/artist.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
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
              <li class="dropdown" id="theme">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-bell"></i>
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>Notification 1</li>
                    <li>Notification 2</li>
                    <li>Notification 3</li>
                    <li>Notification 4</li>
                    <li>Notification 5</li>
                  </ul>
              </li>
              <li id="theme"><a href="php/logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
</div>
<!--begins the body-->
<div class="jumbotron">
  <div class="left">
    <div class="profile">
      <div class="img" align="center">
        <?php 
          $profile="upload/profile/".$_SESSION["pix"];
          if(file_exists($profile))
          {
            echo "<img src='" .$profile. "' alt='profile' class='profile-img img-circle img-responsive'>";
          }
          else
          {
            echo '<img src="profile-sample.png" alt="profile" class="profile-img img-circle img-responsive">';
          }
        ?>
      </div>
      <div class="upload-profile">
          <form action="php/upload.php" method="post" enctype="multipart/form-data">
            <table class="upload-profile-table">
              <tr>
                <td>
                    <span id="fileselector">
                        <label class="btn btn-default" for="upload-file-selector-profile">
                            <input id="upload-file-selector-profile" type="file" name="profile">
                            <i class="glyphicon glyphicon-upload margin-correction"></i>Upload Profile Pix
                        </label>
                    </span>
                </td>
                <td><input type="submit" name="submit-profile" value="Upload"></td>
              </tr>
            </table>
          </form>
        </div>
        <div class="upload-cover">
          <form action="php/upload.php" method="post" enctype="multipart/form-data">
            <table class="upload-cover-table">
              <tr>
                <td>
                    <span id="fileselector">
                        <label class="btn btn-default" for="upload-file-selector-cover">
                            <input id="upload-file-selector-cover" type="file" name="cover">
                            <i class="glyphicon glyphicon-upload margin-correction"></i>Upload Cover Pix
                        </label>
                    </span>
                </td>
                <td><input type="submit" name="submit-cover" value="Upload"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <div class="profile">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "musette";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $name=$_SESSION["username"];
        $sql= 'SELECT * FROM artist';
        $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          {
            echo '<h2 align="center" style="background:#B0E0E6;"><strong>ARTIST DETAILS</strong></h2>';
            echo '<table align="center" style="font-size: 20px; color:White;">';         
              while($row = $result->fetch_assoc())
                 {
                  if($row['Username']== $name)
                  {
                     echo "<tr><td><strong> Name:</strong> ".$row['First Name']." ".$row['Middle Name']." ".$row['Last Name']."</td></tr><tr><td><strong>Address:</strong> ".$row['Address']."</td></tr><tr><td><strong>D.O.B:</strong> ".$row['D.O.B']."</td></tr><tr><td><strong>Gender:</strong> ".$row['Gender']."</td></tr><tr><td><strong>Avaialble Time:</strong> ".$row['AvailableFrom']." to ".$row['AvailableTo']."</td></tr><tr><td><strong>Rate Per Hour:</strong> Rs ".$row['Rate']." |-</td></tr>";
                  }
                 }
    echo "</table>";
}
?>
    <a href="php/artist-video.php" target="ifrm"><button class="btn btn-primary btn-lg lbtn">MY VIDEOS</button></a>
    <a href="php/video.php" target="ifrm"><button class="btn btn-primary btn-lg rbtn">VIDEOS</button></a>
  </div>
  </div>
    <div class="toggle">
    <div class="right" >
      <div class="artist-p">
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
                  echo " <div class = 'modal1'>
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
  </div>
";

                  echo "<br>";
$i++;
                 }
          }
?>
      </div>
    </div>
    <div class="middle">
      <div class="cover">
        <?php 
          $cover="upload/cover/".$_SESSION["pix"];
          if(file_exists($cover))
          {
            echo "<img src='" .$cover. "' alt='cover' class='img-responsive img-rounded cover-img'>";
          }
          else
          {
            echo '<img src="cover-sample.jpg" alt="cover" class="img-responsive img-rounded cover-img">';
          }
        ?>
        <div class="upload-video">
          <form action="php/upload.php" method="post" enctype="multipart/form-data">
            <table>
              <tr>
                <td>
                    <span id="fileselector">
                        <label class="btn btn-default" for="upload-file-selector-video">
                            <input id="upload-file-selector-video" type="file" name="video">
                            <i class="glyphicon glyphicon-upload margin-correction"></i>Select Video to Upload
                        </label>
                    </span>
                </td>
                <td><input type="submit" name="submit-video" value="Upload"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <div class="iframe">
         <iframe id="ifrm" name="ifrm" src="php/video.php" onload="setIframeHeight(this.id)" style="width:100%;border: 0;"></iframe>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<?php
  session_start();
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
      <div class="img">
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
  </div>
  <div class="toggle">
    <div class="right">
      <div class="artist-p">
        <p align="center">featured artist</p>
      </div>
    </div>
		<div class="middle">
			<div class="cover">
        <?php 
          $cover="upload/cover/".$_SESSION["pix"];
          if(file_exists($cover))
          {
            echo "<img src='" .$cover. "' alt='cover' class='img-responsive cover-img'>";
          }
          else
          {
            echo '<img src="cover-sample.jpg" alt="cover" class="img-responsive cover-img">';
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
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
		</div>
  </div>
</div>
</body>
</html>

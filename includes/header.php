<!DOCTYPE html>
<html lang="en">
<head>
<title>RailWala-Your Train App</title>
<link rel="icon" type="image/ico" href="images/logo.png" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href ="./css/index.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<link rel="stylesheet" type="text/css" href="./css/mobileview.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
</head>
<body>
  <div class="w3-top fixed-top" style="margin-bottom: 10%">
  <div class="w3-bar w3-blue w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white"><img src="images/logo.png   " alt="logo" style="width:35px">RailWala</a>
    <a href="./liveStatus.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Live Status</a>
    <a href="./pnrStatus.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">PNR</a>
    <a href="./findTrains.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Find Trains</a>
     <a href="./timeTable.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Time Table</a>

     <img class="playstoreIcon" style="float: right;height: 40px;width: 100px;margin-top: 12px;" src="images/app.png">
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="./liveStatus.php" class="w3-bar-item w3-button w3-padding-large">Live Status</a>
    <a href="./pnrStatus.php" class="w3-bar-item w3-button w3-padding-large">PNR</a>
    <a href="./findTrains.php" class="w3-bar-item w3-button w3-padding-large">Trains B/W Stations</a>
    <a href="./timeTable.php" class="w3-bar-item w3-button w3-padding-large">Time Table</a>
  </div>
</div>  
<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
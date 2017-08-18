<!--Code Indented-->
<?php
@ob_start();
@session_start();
?>
<?php include 'con/con.php'; 



?>



<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

<script src="https://www.gstatic.com/firebasejs/3.4.1/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCbhHVkUz3iBF7wrndkIaN28p7uGrw1yMU",
    authDomain: "lifo-6fbe4.firebaseapp.com",
    databaseURL: "https://lifo-6fbe4.firebaseio.com",
    storageBucket: "lifo-6fbe4.appspot.com",
    messagingSenderId: "807517640325"
  };
  firebase.initializeApp(config);
</script>

<!--- basic page needs
================================================== -->
<meta charset="utf-8">
<title>Aurganon'16</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- mobile specific metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/vendor.css">
<style>
	
#cta {
    background: #034e4a;
    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding-top: 7rem;
    padding-bottom: 0;
    text-align: center;
}
</style>
<!-- script
================================================== -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/scrolling-nav.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/particles.js"></script>
<script src="js/particles.min.js"></script>
<script src="js/materialize.js"></script>
<script>

$(document).ready(function() {
$(".text").hide()

});
function getResults(elem) {
elem.checked && elem.value == "Show" ? $(".text").show() : $(".text").hide();
};
</script>

<!-- favicons
================================================== -->
<link rel="icon" type="image/png" href="images/logo.png">
<!--style>
.fixed-nav {
position: fixed;
top: 0;
left: 0;
width: 100%;
background-color: rgba(255,255,255,.8) ;

white-space: nowrap;
height: 50px;
box-sizing: border-box;
padding: 10px;
box-shadow: 0px 3px 6px rgba(0,0,0,0.16),0px 3px 6px rgba(0,0,0,0.23);      
}

.fixed-nav ul, .fixed-nav li {
display:inline;
}

.fixed-nav a {
text-decoration: none;
text-transform: uppercase;
padding: 17px 10px;
color: #333;
font-family: arial;
}

.fixed-nav a:hover {
background-color: #000;
color: #eee;
}

.fixed-nav ul {
padding:0;
}
.fixed-nav img {
vertical-align: middle;
}
main {margin-top:55px;}
</style>


</head-->

<body id="top">

<!-- header 
================================================== -->
<?php  include 'ui/nav.php'; ?>
<?php include 'ui/top.php'; ?>

<!-- info
================================================== -->
<?php include 'ui/info.php'; ?>

<!-- CTA Section
================================================== -->

<?php include 'ui/sponser1.php'; ?>
<?php include 'ui/sponser.php'; ?>
</div>
<!-- footer
================================================== -->
<?php include 'ui/footer.php'; ?>
<div id="preloader">
  <div id="loader"></div>
  <!--<b>WELCOME!</b>--> 
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style=" height: 50px;    padding: 0px 10px 0px 10px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="padding:10px;">Login</h4>
      </div>
      <div class="modal-body"> 
        <!--<p>Some text in the modal.</p>-->
        <form class="form-horizontal" method="POST" action="login.php">
          <div class="form-group" style="margin-bottom: 0px;">
            <div class="col-twelve col-full">
              <input type="email" class="form-control" name="uname" id="email" placeholder="Enter email">
            </div>
          </div>
          <div class="form-group" style="    margin-bottom: 0px;">
            <div class="col-twelve col-full">
              <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password">
            </div>
          </div>
          <div class="form-group" style="    margin-bottom: 0px;">
            <div class="col-twelve">
              <button type="submit" class="button" style="width:100%;">LOGIN</button>
            </div>
            <div class="col-twelve">
              <button type="button" class="button"  style="width:100%;">REGISTER</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="signup" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style=" height: 50px;    padding: 0px 10px 0px 10px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="padding:10px;">Sign Up</h4>
      </div>
      <div class="modal-body"> 
        <!--<p>Some text in the modal.</p>-->
        <form class="form-horizontal">
          <div class="form-group" style="margin-bottom: 0px;">
            <div class="col-twelve col-full">
              <input type="text" class="form-control" id="name" placeholder="Enter Name">
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 0px;">
            <div class="col-twelve col-full">
              <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
          </div>
          <div class="form-group" style="    margin-bottom: 0px;">
            <div class="col-twelve col-full">
              <input type="password" class="form-control" id="pwd" placeholder="Enter password">
            </div>
          </div>
          <div class="form-group" style="    margin-bottom: 0px;">
            <div class="col-twelve">
              <button type="submit" class="button" style="width:100%;">LOGIN</button>
            </div>
            <div class="col-twelve">
              <button type="submit" class="button"  style="width:100%;">REGISTER</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php





?>
<!-- Java Script
================================================== --> 
<script src="js/classie.js"></script> 
<script src="js/borderMenu.js"></script> 
<script   src="https://code.jquery.com/jquery-3.1.0.min.js"  integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery-2.1.3.min.js"></script> 
<script src="js/plugins.js"></script> 
<script src="js/main.js"></script> 
<script src="js/materialize.js"></script> 
</body>
</html>
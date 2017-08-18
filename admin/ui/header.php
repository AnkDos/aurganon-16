<nav class="light-blue lighten-1" role="navigation">
	<div class="nav-wrapper container"><a id="logo-container" href="" class="brand-logo">Aurganon Dashbard</a>
	<ul class="right hide-on-med-and-down">
	<?php
	
	if(isset($_SESSION['cool'])&&!empty($_SESSION['cool']))
 	{
 		?>
        <li><a href="logout.php">Logout</a></li>
        <?php	
 	}
 	else
 	{
 		?>
        <li><a href="#">Login Please</a></li>
        <?php
    } ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
   <?php
   if(isset($_SESSION['cool'])&&!empty($_SESSION['cool']))
 {
 ?>
 	
        <li><a href="logout.php">Logout</a></li>
 <?php	
 }
 else
 {
 ?>
        <li><a href="#">Login Please</a></li>
        
        <?php
 } ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
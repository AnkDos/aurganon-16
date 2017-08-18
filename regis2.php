<?php

	if(isset($_GET['id'])&&!empty($_GET['id']))
		{
			 $id = addslashes(crypto($_GET['id'], 'decrypt'));
			$query= "SELECT * FROM events WHERE ID='$id'";
			$runq = mysqli_query($con,$query);
			while($Nrows = mysqli_fetch_assoc($runq))
		
				{
					$row1=$Nrows['TEAM'];
					$row=$Nrows;
					
				
				}  
	
		if($row1=='1')
						{
							$tea="TEAM EVENT";
						}
					else if($te == '0')
						{
							$tea="INDIVIDUAL";
						}
						
					// 	$etype = $row['CATEGORY'];
					// $row = mysqli_fetch_array($runq);
	if(isset($_POST['btn']))
{
	if( !isset($_SESSION['admin']) ) {
 header("Location:login.php");
  exit;
}
else{
	
		// $querry=$_SESSION['admin'];
		// $querry1=mysqli_query($con,"update registered_users set EVENTS='$id' WHERE ID='$querry'");
	
}
}
		
	
	
	
		}
		
		
	
		
		
		
		
		
?> 

<link rel="stylesheet" href="css/bootstrap.min.css"> 

<section id="cta" style="background-image:url(images/deadp.jpg); ">

   <style>
	   	.col-md-4{
	   		text-align: left;
	   	}
	   	.h01{
	   		color:#FDFEFE;
	   	}
	   	.col-xs-offset-2{
	   		margin-top: 15px;
	   	}
   </style>
	<div class="row" style="margin-right:0px;margin-left:0px;" >
		<h1 class="h01" style="color:#F7B000; ">Event - <?php echo $row['NAME']; ?> </h2>
		<div class="col-md-offset-5 col-md-7" style="background:#02312e; padding-top: 13px;">
			<style>
				#cta p.lead{
					color:#ffffff;
					text-align:left;
					font-weight:900;
				}
				#abs {
					overflow-y:scroll;
					border-top:#000000 solid 1px;
					border-bottom:#000000 solid 1px;
					border-left:#000000 solid 1px;
					color:#ffffff;
					text-align:left;
					height:20rem;
					padding:0px 10px 0px 10px;
				}
			</style>
			
			<p class="lead"><b style="font-size: 3rem; padding-top:1px;">" <?php echo $row['DESCRIPTION']; ?> "</b></p>
		    <p class="lead">EVENT TYPE : <?php echo $tea; ?></p>
		    <p class="lead">Abstract : <br><div id="abs" style="font-size: 2rem;"><?php echo $row['ABSTRACT']; ?></div></p>
	  		<p class="lead">Venue : <?php echo $row['PLACE']; ?></p>
	  		<p class="lead">Time : <?php echo $row['TIME']; ?></p>
		  	<p class="lead">Fee : <?php if ($row['PRICE'] == 0) {echo "FREE EVENT"; }
  				else if($row['PRICE'] == 1) { echo "Paid Event";}
  				else { echo $row['PRICE']; } ?></p>
  	 <p>
  	 	<?php 
  	 	if($row['CATEGORY'] !='2')
{
	?>

<a href="evereg.php?id=<?php echo crypto($row['ID'], 'encrypt'); ?>" class="button" style="background: #151515;
color: #FFFFFF;
border: none;" role="button">Register</a>
<?php
}
else
{
?>

<a href="http://<?php echo $row['PLACE']; ?>" class="button" style="background: #151515;
color: #FFFFFF;
border: none;" role="button">Register</a>
<?php
}
?></p>
	
  		</div>
  	</div>
</section>
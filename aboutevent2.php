<?php
	//include 'con/con.php'; 
//	echo 'hello';
	
	if(isset($_GET['id'])&&!empty($_GET['id']))
		{
			 $id = addslashes(crypto($_GET['id'], 'decrypt'));
			
			$query= "SELECT * FROM events WHERE ID='$id'";
			$runq = mysqli_query($con,$query);
			
			$Nrows = mysqli_num_rows($runq); 
			for($i=0;$i<$Nrows;$i++)
				{
					$te=$row['TEAM'];
					if($te==1)
					{
						$tea="TEAM EVENT";
					}
					else
					{
						$tea="INDIVIDUAL";
					}
					$row = mysqli_fetch_array($runq);
				}  
		}
?>

<html>
<body>
	
	<?php include 'regis2.php'; ?>

</body>
</html>
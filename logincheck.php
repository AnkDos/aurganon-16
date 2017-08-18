<!--Code Indented-->
<?php
session_start();

if(isset($_POST['uname'])&&isset($_POST['pwd']))
{
    if(!empty($_POST['uname'])&&!empty($_POST['pwd']))
    {
    	$unm = addslashes($_POST['uname']);
    	$pwd = addslashes($_POST['pwd']);
    	
    	$checkdb = "SELECT * FROM  `registered_users` WHERE EMAIL ='$unm'";
    	
    	$runcheck = mysqli_query($con, $checkdb);
    	
    	while($data = mysqli_fetch_assoc($runcheck))
        {
        	$pass = $data['ENCRYPTED_PASSWORD'];
            $id = $data['ID'];
        	$name = $data['NAME'];
    	}
    	
    	if($pass == $pwd)
    	{
    		$_SESSION['admin'] = $id;
        	$_SESSION['name'] = $name;
        	if(isset($_GET['redirect'])&&!empty($_GET['redirect']))
        	{
        		header('location:'.$_GET['redirect']);
        		exit();
        	}	
        	else
        	{
        		header('location:index.php');
        	}
    	}
    	else
    	{
        	$error = "incorrect username or password";
    	}
    }
	else
	{
    	$error = "fields are missing";
	}
}
?>
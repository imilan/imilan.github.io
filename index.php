<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start(); 
include('connectivity.php');
if(isset($_POST['action']))
{          
    if($_POST['action']=="login")
    {
        $user = strip_tags($_POST['loguser']);
        $password = strip_tags($_POST['logpassword']);
		
        $strSQL = mysqli_query($connection,"SELECT userID, username, password, email FROM members WHERE username = '".$user."' LIMIT 1");
		
		
		if($strSQL)
		{
			$row = mysqli_fetch_row($strSQL);
			$userID = $row[0];
			$dbusername = $row[1];
			$dbpassword = $row[2];
			$dbemail = $row[3];
			
		}
		
		if($user == $dbusername && $password == $dbpassword)
		{
			$_SESSION['username'] = $user;
			$_SESSION['id'] = $userID;
			header("Location: user.php");
			
		}
		else
		{
			echo"incorrect stuff";
				header('Location: index.html');
			
		}
			
    }
    elseif($_POST['action']=="signup")
    {
        $name       = mysqli_real_escape_string($connection,$_POST['user']);
        $email      = mysqli_real_escape_string($connection,$_POST['email']);
        $password   = mysqli_real_escape_string($connection,$_POST['password']);
        $query = "SELECT email FROM members WHERE email='".$email."'";
        $result = mysqli_query($connection,$query);
        $numResults = mysqli_num_rows($result);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $message =  "Invalid email address please type a valid email!!";
        }
        elseif($numResults>=1)
        {
            $message = $email." Email already exist!!";
        }
        else
        {
            mysqli_query($connection,"INSERT INTO members(username,email,password) VALUES('".$name."','".$email."','".$password."')");
            $message = "Signup Sucessfully!!";
			header('Location: index.html');
        }
    }
}

?>

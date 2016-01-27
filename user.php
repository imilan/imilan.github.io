<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();   //starting the session for user profile page

if(isset($_SESSION['id']))
{
	$userid = $_SESSION['id'];
	$username = $_SESSION['username'];
	
		
}
else
{
	header('Location: index.php');
	die();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" /> 
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 
  
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header" data-position="fixed">
    <h1>User Page</h1>
  </div>

  <div data-role="main" class="ui-content">
<?php echo "Welcome $username. Your ID is $userid"; ?>

<form action="logout.php">
	<input type="submit" value="Log Out" />
</form> 

</div>

  <div data-role="footer" data-position="fixed" class="ui-bar">
  <a href="#pagetwo" data-role="button">NBA</a>
  <a href="#pagethree" data-role="button">NFL</a>
    
  </div>
</div> 

<div data-role="page" id="pagetwo"> <!-- data-dialog ="true" -->
	
<div data-role="header" data-position="fixed">
	<h1>Basketball Page</h1>
</div>

  <div data-role="main" class="ui-content">    
	<img src="http://blog.fidmdigitalarts.com/wp-content/uploads/2011/04/nba-logo.jpg" alt="Mountain View" style="width:304px;height:228px;">	   
		<object type="text/html" data="http://stats.nba.com/" width="800px" height="600px" style="overflow:auto;border:5px ridge blue">
    </object>
		</div>

  

  <div data-role="footer" data-position="fixed" class="ui-bar">
  <a href="#pageone" data-role="button">User</a>
  <a href="#pagethree" data-role="button">NFL</a>
    
  </div>
</div> 

<div data-role="page" id="pagethree">
  <div data-role="header">
    <h1>Football Page</h1>
  </div>
  
    <div data-role="main" class="ui-content">
	
	<img src="http://americanfootballfilms.com/wp-content/uploads/2012/11/nfl-logo.jpg" alt="Mountain View" style="width:304px;height:228px;">
	
	  <object type="text/html" data="http://www.nfl.com/stats/player?seasonId=2015&seasonType=REG&Submit=Go" width="800px" height="600px" style="overflow:auto;border:5px ridge blue">
    </object>

	</div>


  <div data-role="footer" data-position="fixed" class="ui-bar">
  <a href="#pageone" data-role="button">User</a>
  <a href="#pagetwo" data-role="button">NBA</a>
    
  </div>
</div> 

</form> 
</body>
</html> 
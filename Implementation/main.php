<html>
<head>
	<meta charset="utf-8">
	<title>Main Page</title>
		<link href="stylesheet.css" rel="stylesheet"  type="text/css">

</head>
<body style="background-image:url(image.jpeg); background-repeat:no-repeat;background-size: 105%;">
	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	
		<p>
		<nav class="sideMenu" >
						
						<ul>	
							<li> <a href="Projects.php"> Projects</a> </li>
							<li> <a href="department.php"> Department</a> </li>					
							 <li> <a href="employee.php"> Employees  </a> </li>
							  <li> <a href="Query.php"> Query</a> </li>
							  
							  
							 </ul>
							 </nav>
		<div id="welcome">
			<strong><font size="30">Welcome to our Company</font></strong> 
			</br>
		</div>
			
			<div id="text">
				please choose from the entities above in order</br> to make modifications to the database
			</div>
		

			</br>
		</p>
	</form>





 </body>
</html> 
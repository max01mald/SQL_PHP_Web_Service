<html>
<head>
	<meta charset="utf-8">
	<title>Projects entity</title>
	<body style="background-image:url(); background-repeat:no-repeat;background-size: 105%;">
			<link href="stylesheet.css" rel="stylesheet"  type="text/css">

</head>
<body>

	<nav class="sideMenu" >
						
						<ul>							
							 <li> <a href="department.php"> Department</a> </li>					
							 <li> <a href="employee.php"> Employees  </a> </li>
							  <li> <a href="main.php"> Home</a> </li>
							  <li> <a href="Query.php"> Query</a> </li>
							 </ul>
							 </nav>
	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		
		 <div id="ProjText">
		<p>
			<h1>Projects</h1>
			<br><br>

			<strong> Please choose the transaction type and the attributes you would like to add, delete or modify from the given list. 
			Afterwards, type in the box the corresponding attribute.
				</strong>
			</br> </br>

			Transaction type:
			<select name="transaction">
			<option value="add"> Add </option> 
			<option value="delete"> Delete </option> 
			<option value="modify"> Modify </option> 
			</select> 

			</br> </br>

			
			
			PID </br>
			</select>
			<input type="text" name="PID" size = "100" value = "">
			</br> </br>

			Project Name	</br>
			<input type="text" name="ProjName" size = "100" value = "">
			</br> </br>

			Project Start-Date</br>
			<input type="text" name="SD" size = "100" value = "">
			</br> </br>
			
			Project Dead-Line	 </br>
			<input type="text" name="DL" size = "100" value = "">
			</br> </br>

			Leader_SIN</br>
			<input type="text" name="LSIN" size = "100" value = "">
			</br> </br>
				

			LID</br>
			<input type="text" name="LID" size = "100" value = "">
			</br> </br>
			<input type="submit">	




		</div>
		</p>
	</form>

	<?php 
	
	
	
		include "realInsert.php";
	
		$insert = new RealInserting();
		$parser = new RealParser();
	
		$object = "";
		$sql = "";

		$sin = $_POST['PID'];
		$name = $_POST['ProjName'];
		$add = $_POST['DL'];
		$dob = $_POST['SD'];
		$gen = $_POST['LSIN'];
		$sal = $_POST['LID'];
		$esin = "";
	
		$id = $_POST['transaction'];
		
	
		if(strcmp($id, "add") == 0)
		{
			
			$object = $parser->Project($sin, $name, $add, $dob, $gen, $sal); 
				
			$sql = $insert->insertRealProj($object);	
			
		}
		else if(strcmp($id, "delete") == 0)
		{
			
			$sql = "DELETE FROM Project WHERE PID = $sin;";	
			
			
		}
		else if(strcmp($id, "modify") == 0)
		{
			
			$sql = $insert->modifyRealProject($sin, $name, $add, $dob, $gen, $sal);
			
			
		}

		$servername = "ezc353.encs.concordia.ca";
		$username = "ezc353_4";
		$password = "d474b45e";
		$dbname = "ezc353_4";

	
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if($sql != "")
		{
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			if ($conn->query($sql) === TRUE) 
			{
				echo "Transaction is accepted<br>";
				echo $sql;
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	
	 
	?>



 </body>
</html> 
				

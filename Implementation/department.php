<html>
<head>
	<meta charset="utf-8">
	<title>Department entity</title>
	<body style="background-image:url(); background-repeat:no-repeat;background-size: 105%;">
			<link href="stylesheet.css" rel="stylesheet"  type="text/css">

</head>
<body>

	<nav class="sideMenu" >
						
						<ul>							
							 <li> <a href="Projects.php"> Projects</a> </li>
							 <li> <a href="employee.php"> Employees  </a> </li>
							  <li> <a href="main.php"> Home</a> </li>
							  <li> <a href="Query.php"> Query</a> </li>
							 </ul>
							 </nav>
	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		
		 <div id="depText">
		<p>
			<h1>Department</h1>
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
			<br><br>
			Transaction Branch: 
			<select name="branch2">
			<option value="null"> N/A</option> 
			<option value="Location"> Location </option> 
			</select>
			</br> </br>

			</br> </br>
			
			DID:  </br>
			<input type="text" name="DID" size = "100" value = "">
			</br> </br>
			
			Department Name: (Location-> Address) </br>
			<input type="text" name="DepName" size = "100" value = "">
			</br> </br>

			Manager_SIN (Location-> LID) </br>
			<input type="text" name="LID" size = "100" value = "">
			</br> </br>

			Manager_StartDate </br>
			<input type="text" name="SD" size = "100" value = "">
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
	
		$sin = $_POST['DID'];
		$name = $_POST['DepName'];
		$add = $_POST['LID'];
		$dob = $_POST['SD'];
		$gen = "";
		$sal = "";
	
		$id = $_POST['transaction'];
		$id2 = $_POST['branch2'];

		echo $id;
	
		if(strcmp($id, "add") == 0)
		{
			if(strcmp($id2, "null") == 0)
			{
				$object = $parser->Department($sin, $name, $add, $dob, $gen, $sal);
		
				$sql = $insert->insertRealDep($object);
			}
			else if(strcmp($id2, "Location") == 0)
			{
				$object = $parser->Location($sin, $name, $add, $dob, $gen, $sal);
		
				$sql = $insert->insertRealLocation($object);
			}	
		}
		else if(strcmp($id, "delete") == 0)
		{
			if(strcmp($id2, "null") == 0)
			{
				$sql = "DELETE FROM Department WHERE DID = $sin;";
			}
			else if(strcmp($id2, "Location") == 0)
			{
				$sql = "DELETE FROM Location WHERE LID = $add;";
			}		
		}
		else if(strcmp($id, "modify") == 0)
		{
			if(strcmp($id2, "null") == 0)
			{
				$sql = $insert->modifyRealDep($sin, $name, $add, $dob, $gen, $sal);
			}
			else if(strcmp($id2, "Location") == 0)
			{
				$sql = $insert->modifyRealLocation($sin, $name, $add, $dob, $gen, $sal);
			}
		}

		

		$servername = "ezc353.encs.concordia.ca";
		$username = "ezc353_4";
		$password = "d474b45e";
		$dbname = "ezc353_4";

		if($sql != null)
		{	
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			if ($conn->query($sql) === TRUE) 
			{
				echo "Successful Transaction<br>";
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
					

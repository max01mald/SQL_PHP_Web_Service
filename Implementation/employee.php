<html>
<head>
	<meta charset="utf-8">
	<title>Employee entity</title>
	<body style="background-image:url(); background-repeat:no-repeat;background-size: 105%;">
			<link href="stylesheet.css" rel="stylesheet"  type="text/css">

</head>
<body>

	<nav class="sideMenu" >
						
						<ul>							
							 <li> <a href="Projects.php"> Projects</a> </li>
							 <li> <a href="department.php"> Department</a> </li>					
							 <li> <a href="main.php"> Home</a> </li>
							 <li> <a href="Query.php"> Query</a> </li>
							 </ul>
							 </nav>
	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		
	<div id="EmpText">
		<p>
			<h1>Employees</h1>
			<br><br>

			Please choose the transaction type and the attributes you would like to add, delete or modify from the given list. 
			Afterwards, type in the box the corresponding attribute.

			</br> </br>

			Transaction type:
			<select name="transaction">
			<option value="add"> Add </option> 
			<option value="delete"> Delete </option> 
			<option value="modify"> Modify </option> 
			</select> 

			</br> </br>

			Transaction Branch: 
			<select name="branch">
			<option value="null"> N/A</option> 
			<option value="WO"> WorksOn </option> 
			<option value="Super"> Supervised </option> 
			<option value="Depen"> Dependent </option> 
			<option value="Phone"> Phone </option> 
			</select>
			</br> </br>
			
			SIN (SuperVising->SIN_Subordinate)  </br>
			<input type="text" name="SIN" size = "100" value = "">
			</br> </br>

			Name (Supervising->SIN_Superior) (WorksOn->PID) (WorksFor && Manages->DID)  (Phone->Number)</br> 
			<input type="text" name="Name_Emp" size = "100" value = "">
			</br> </br>
			
			Address (WorksOn->Hours MOD->Add_Hours NOT BOTH)  (Manages->Start Date)  (Phone->Type) </br> 
			<input type="text" name="Address" size = "100" value = "">
			</br> </br>
			
			Date Of Birth (WorksOn_MOD->New_Hours NOT BOTH)</br> 
			<input type="text" name="DOB" size = "100" value = "">
			</br> </br>

			Gender</br> 
			<input type="text" name="Gender" size = "100" value = "">
			</br> </br>
			
			Salary (Dependent->Relationship)</br> 
			<input type="text" name="Salary" size = "100" value = "">
			</br> </br>
			
			DID (Employe->Dpendent_SIN)</br> 
			<input type="text" name="ESIN" size = "100" value = "">
			</br> </br>

			<input type="submit">
		</p>
	</form>
</div>


<?php 
	$servername = "ezc353.encs.concordia.ca";
	$username = "ezc353_4";
	$password = "d474b45e";
	$dbname = "ezc353_4";
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	include "realInsert.php";
	
	$insert = new RealInserting();
	$parser = new RealParser();
	
	$object = "";
	$sql = "";

	$sin = $_POST['SIN'];
	$name = $_POST['Name_Emp'];
	$add = $_POST['Address'];
	$dob = $_POST['DOB'];
	$gen = $_POST['Gender'];
	$sal = $_POST['Salary'];
	$esin = $_POST['ESIN'];
	
	$id = $_POST['transaction'];
	$id2 = $_POST['branch'];
	
	if(strcmp($id, "add") == 0)
	{
		if(strcmp($id2, "null") == 0)
		{
			$object = $parser->Employee($sin, $name, $add, $dob, $gen, $sal, $esin); 
			
			$sql = $insert->insertRealEmp($object);	
		}
		else if(strcmp($_POST['branch'], "WO") == 0)
		{
			$object = $parser->WO($sin, $name, $add, $dob, $gen, $sal); 
			
			$sql = $insert->insertRealWO($object);
		}
		else if(strcmp($_POST['branch'], "Super") == 0)
		{
			$object = $parser->SuperVisor($sin, $name, $add, $dob, $gen, $sal); 
			
			$sql = $insert->insertRealSuperVising($object);
			
		}
		else if(strcmp($_POST['branch'], "Depen") == 0)
		{
			$object = $parser->Dependent($sin, $name, $add, $dob, $gen, $sal, $esin);
			
			$sql = $insert->insertRealDependent($object);
		}
		else if(strcmp($_POST['branch'], "Phone") == 0)
		{
			$object = $parser->Phone($sin, $name, $add, $dob, $gen, $sal); 
			
			$sql = $insert->insertRealPhone($object);
		}
	
	}
	else if(strcmp($id, "delete") == 0)
	{
		if(strcmp($id2, "null") == 0)
		{
			$sql = "DELETE FROM Employee WHERE Employee_SIN = \"$sin\";";	
		}
		else if(strcmp($_POST['branch'], "WO") == 0)
		{
			$sql = "DELETE FROM WorksOn WHERE Employee_SIN = \"$sin\" AND PID = $name;";
		}
		else if(strcmp($_POST['branch'], "Super") == 0)
		{
			$sql = "DELETE FROM SuperVising WHERE Sub_SIN = \"$sin\";";
			
		}
		else if(strcmp($_POST['branch'], "Depen") == 0)
		{
			$sql = "DELETE FROM Dependent WHERE Dep_SIN = \"$esin\";";
		}
		else if(strcmp($_POST['branch'], "Phone") == 0)
		{
			$sql = "DELETE FROM Phone WHERE Employee_SIN = \"$sin\";";
		}
	
	}
	else if(strcmp($id, "modify") == 0)
	{
		if(strcmp($id2, "null") == 0)
		{
			$sql = $insert->modifyRealEmployee($sin, $name, $add, $dob, $gen, $sal, $esin);
		}
		else if(strcmp($_POST['branch'], "WO") == 0)
		{	
			if($add != "")
			{
				$cq = "Select Hours From WorksOn Where Employee_SIN = \"$sin\";";
			
				$result = mysqli_query($conn, $cq);
				$row = mysqli_fetch_assoc($result);
			
				foreach($row as $k => $v)
				{
					$int = $v;
				}
				echo $int;
				$add += $int;				
			}
			else
			{			
				$add = $dob;
			}

			$sql = $insert->modifyRealWO($sin, $name, $add, $dob, $gen, $sal);
		}
		else if(strcmp($_POST['branch'], "Super") == 0)
		{
			$sql = "UPDATE SuperVising SET Sub_SIN = \"$sin\", Sup_SIN = \"$name\" WHERE Sub_SIN = \"$sin\";";
			
		}
		else if(strcmp($_POST['branch'], "Depen") == 0)
		{
			$sql = $insert->modifyRealDependent($sin, $name, $add, $dob, $gen, $sal, $esin);
		}
		else if(strcmp($_POST['branch'], "Phone") == 0)
		{
			$sql = $insert->modifyRealPhone($sin, $name, $add, $dob, $gen, $sal);
		}
	
	}
	

	if($sql != "")
	{
		if ($conn->query($sql) === TRUE) 
		{
			echo "Successfull Execution of Query<br>";
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
					

<html>
<head>
	<meta charset="utf-8">
	<title>Query</title>
	<body style="background-image:url(); background-repeat:no-repeat;background-size: 105%;">
			<link href="stylesheet.css" rel="stylesheet"  type="text/css">

</head>
<body>

	<nav class="sideMenu" >
						
		<ul>							
			 <li> <a href="Projects.php"> Projects</a> </li>
			 <li> <a href="department.php"> Department</a> </li>					
			 <li> <a href="employee.php"> Employees  </a> </li>
			  <li> <a href="main.php"> Home</a> </li>
			  
		</ul>
	</nav>
	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		
		 <div id="depText">
		<p>

			<h1>Query</h1>
			<br><br>

			<h2> Please pick a custom or provided query. </h2>
			</br> </br>
			
			Display Table:
			<select name="transaction">
			<option value="null"> N/A </option>
			<option value="Employee"> Employee </option> 
			<option value="Department"> Department </option> 
			<option value="Project"> Project </option>
			<option value="WorksOn"> WorksOn </option> 
			<option value="Location"> Location </option> 
			<option value="Dependent"> Dependent </option>
			<option value="SuperVising"> SuperVising </option> 
			<option value="Phone"> Phone </option>   
			</select> 
			</br></br>
			
			<input type="submit">
			
			<br><br>

			<h2>Custom Query </h2></br>
			<input type="text" name="CustomQuery" size = "100" value = "">
			</br> </br>
			
			<input type="submit">

			<br><br>

			<h2>Employee Section:</h2><br><br>

			See Subordinate of a Supervisor. Enter Sup_SIN:  </br>
			<input type="text" name="Sup" size = "100" value = "">
			</br> </br>

			Total Hours Worked on Projects. Enter Employee_SIN:  </br>
			<input type="text" name="EmpWork" size = "100" value = "">
			</br> </br>

			Employee Phone Information. Enter Employee_SIN:  </br>
			<input type="text" name="Phone" size = "100" value = "">
			</br> </br>

			Employees in Department. Enter DID:  </br>
			<input type="text" name="EmDep" size = "100" value = "">
			</br> </br>


			<select name="Employee">
			<option value="null"> N/A </option>
			<option value="Sup"> Supervisor and their Subs </option> 
			<option value="Avg"> Average Salary</option>
			<option value="WorkProj"> Total Work on Project</option>
			<option value="DepInfo"> Dependents of Employees</option>
			<option value="AvgAge"> Average Age of Employees in Company</option>
			<option value="EmpDep"> Employees by Department</option>
			
			</select> 
			</br></br>

			<input type="submit">

			<br><br>

			<h2>Project Section:</h2><br><br>

			See Project Progress. Enter PID:  </br>
			<input type="text" name="ProjectProg" size = "100" value = "">
			</br> </br>

			Total Hours Worked on Project. Enter PID:  </br>
			<input type="text" name="ProjectHour" size = "100" value = "">
			</br> </br>

			Employees Working on Project. Enter PID:  </br>
			<input type="text" name="EmpOP" size = "100" value = "">
			</br> </br>

			<select name="Project">
			<option value="null"> N/A </option>
			<option value="EmpProj"> Employee per Project </option> 
			<option value="ProjLoc"> Location by Project</option>
			<option value="ProPart"> Max Participation in Projects</option>
			<option value="NoPro"> Employees not in Projects</option>
			</select> 
			</br></br>
			
			<input type="submit">
			</br></br>

			<h2>Department Section:</h2><br><br>

			Length of time Manager has been in charge of Department. Enter DID:  </br>
			<input type="text" name="ManWork" size = "100" value = "">
			</br> </br>

			Projects per Department. Enter DID:  </br>
			<input type="text" name="DepProj" size = "100" value = "">
			</br> </br>

			Employees Working for Department. Enter DID:  </br>
			<input type="text" name="DepaEm" size = "100" value = "">
			</br> </br>

			Average Age per Department. Enter DID:  </br>
			<input type="text" name="AgeDep" size = "100" value = "">
			</br> </br>

			<select name="Department">
			<option value="null"> N/A </option>
			<option value="DempD"> Display Employees by Department</option>
			<option value="NumDep"> Number of Employee per Department </option> 
			<option value="DepLoc"> Location by Department</option>
			<option value="DependsDep"> Dependents per Department</option>
			<option value="ProDep"> Projects belonging to Department</option>
			<option value="NumPD"> Number of Projects per Department</option>
			<option value="LeM"> Display Managers who are also Leaders</option>
			<option value="ManIn"> Manager Infromation</option>
			</select> 
			</br></br>

			

			<input type="submit">

			
			</div>
		</p>
	</form>


	 

	
	<?php 
	
	
		include "realInsert.php";
		
		$servername = "ezc353.encs.concordia.ca";
		$username = "ezc353_4";
		$password = "d474b45e";
		$dbname = "ezc353_4";

	
		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "";

		$id = $_POST['transaction'];
		$id2 = $_POST['Project'];
		$id3 = $_POST['Employee'];		
		$id4 = $_POST['Department'];


		$prog = $_POST['ProjectProg'];		
		$hour = $_POST['ProjectHour'];
		$emp = $_POST['EmpOP'];
		$cust = $_POST['CustomQuery'];
		$sup = $_POST['Sup'];
		$work = $_POST['EmpWork'];
		$phone = $_POST['Phone'];
		$manag = $_POST['ManWork'];
		$deppr = $_POST['DepProj'];
		$depemp = $_POST['DepaEm'];
		$agedep = $_POST['AgeDep'];

		$ageTest = false;

		if($prog != "")
		{
			$sql = "Select Proj_StartDate, DeadLine From Project Where PID = $prog;";
		}
		else if($hour != "")
		{
			$sql = "Select Sum(Hours) From WorksOn Where PID = $hour;";
		}
		else if($cust != "")
		{
			$sql = $cust;
		}
		else if($emp != null)
		{
			$sql = "Select Employee_SIN, Employee_Name from WorksOn natural join Employee Where PID = $emp";
		}
		else if($sup != null)
		{
			$sql = "Select Sup_SIN, Supervisor.Employee_Name as Supervisor, Sub_SIN, Employee.Employee_Name as Subordinate from Employee, SuperVising, Employee as Supervisor Where Employee.Employee_SIN = Sub_SIN and Supervisor.Employee_SIN = Sup_SIN and Sup_SIN = \"$sup\";";
		}
		else if($work != null)
		{
			$sql = "Select Employee_SIN, Employee_Name, PID, Hours from Employee natural join WorksOn where Employee_SIN = \"$work\";";
		}
		else if($phone != null)
		{
			$sql = "Select Employee_Name, Phone_Number, Phone_Type from Phone natural join Employee where Employee_SIN = \"$phone\";";
		}
		else if($manag != null)
		{	
			$man = true;
			$ageTest = true;
			$sql = "Select Manager_StartDate from Department Where DID = $manag;";
		}
		else if($deppr != null)
		{
			$sql = "Select DID, Dept_Name, PID, Proj_Name from Project natural join Location natural join Department Where DID = $deppr;";
		}
		else if($depemp != null)
		{
			$sql = "Select DID, Dept_Name, Employee_SIN, Employee_Name from Employee natural join Department where DID = $depemp;";
		}
		else if($agedep != null)
		{
			$ageTest = true;

			$sql = "Select DateOfBirth from Employee where Employee.DID = $agedep;";
		}





		if(strcmp($id2, "EmpProj")== 0)
		{
			$sql = "Select PID, Proj_Name, Leader_SIN, COUNT(distinct Employee_SIN) 'NumOfEmp' From Project natural join WorksOn group by PID;";
		}
		else if(strcmp($id2, "ProjLoc")== 0)
		{
			$sql = "Select PID, Proj_Name, LID, Address from Project natural join Location;";
		}
		else if(strcmp($id2, "ProjLoc")== 0)
		{
			$sql = "Select PID, Proj_Name, LID, Address from Project natural join Location;";
		}
		else if(strcmp($id2, "ProPart")== 0)
		{
			$sql = "Select Employee_SIN, Employee_Name, Max(NumOfProj) from (Select Employee_SIN, Employee_Name, count(PID) as 'NumOfProj' from WorksOn natural join Employee group by PID) as Content;";
		}
		else if(strcmp($id2, "NoPro")== 0)
		{
			$sql = "Select Employee_SIN, Employee_Name from Employee Where Employee_SIN not in (Select Employee_SIN from WorksOn);";
		}


		if(strcmp($id3, "EmpProj")== 0)
		{
			$sql = "Select PID, Proj_Name, Leader_SIN, COUNT(distinct Employee_SIN) 'NumOfEmp' From Project natural join WorksOn group by PID;";
		}
		else if(strcmp($id3, "ProjLoc")== 0)
		{
			$sql = "Select PID, Proj_Name, LID, Address from Project natural join Location;";
		}
		else if(strcmp($id3, "ProjLoc")== 0)
		{
			$sql = "Select PID, Proj_Name, LID, Address from Project natural join Location;";
		}
		else if(strcmp($id3, "Sup")== 0)
		{
			$sql = "Select Sup_SIN, Supervisor.Employee_Name as Supervisor, Sub_SIN, Employee.Employee_Name as Subordinate from Employee, SuperVising, Employee as Supervisor Where Employee.Employee_SIN = Sub_SIN and Supervisor.Employee_SIN = Sup_SIN;";
		}
		else if(strcmp($id3, "Avg")== 0)
		{
			$sql = "Select t3.AvgSalary, t1.AvgMaleSalary, t2.AvgFemaleSalary from (Select avg(Salary) as AvgMaleSalary from Employee Where Gender = \"M\") as t1, (Select avg(Salary) as AvgFemaleSalary from Employee Where Gender = \"F\") as t2, (Select avg(Salary) as AvgSalary from Employee) as t3;";
		}
		else if(strcmp($id3, "WorkProj")== 0)
		{
			$sql = "Select Employee_SIN, count(PID) as NumOfProjects, sum(Hours) as TotalNumOfHours from WorksOn group by Employee_SIN;";
		}
		else if(strcmp($id3, "DepInfo")== 0)
		{
			$sql = "Select Employee.Employee_SIN, Employee_Name, Dep_SIN, DEP_Name, relationship from Employee, Dependent where Employee.Employee_SIN = Dependent.Employee_SIN;";
		}
		else if(strcmp($id3, "AvgAge")== 0)
		{
			$ageTest = true;
			$sql = "Select DateOfBirth from Employee;";
		}
		else if(strcmp($id3, "EmpDep")== 0)
		{
			$sql = "Select DID, Dept_Name, Employee_SIN, Employee_Name from Employee natural join Department order by DID;";
		}


		if(strcmp($id4, "NumDep")== 0)
		{
			$sql = "Select DID, Dept_Name, count(distinct Employee_SIN) 'NumOfEmp' from Department natural join Employee group by DID;";
		}
		else if(strcmp($id4, "DepLoc")== 0)
		{
			$sql = "Select DID, Dept_Name, LID, Address from Department natural join Location order by DID;";
		}
		else if(strcmp($id4, "DempD")== 0)
		{
			$sql = "Select DID, Dept_Name, Employee_SIN, Employee_Name from Employee natural join Department order by DID;";
		}
		else if(strcmp($id4, "ProDep")== 0)
		{
			$sql = "Select DID, Dept_Name, PID, Proj_Name from Project natural join Location natural join Department order by DID;";
		}
		else if(strcmp($id4, "NumPD")== 0)
		{
			$sql = "Select DID, count(distinct PID) 'NumOfProjects', sum(Hours) as TotalNumOfHours from Project natural join Location natural join WorksOn group by DID;";
		}
		else if(strcmp($id4, "DependsDep")== 0)
		{
			$sql = "Select DID, Dept_Name, count(distinct Dep_SIN) 'NumOfDependents' from Department natural join Employee, Dependent where Employee.Employee_SIN = Dependent.Employee_SIN group by DID;";
		}
		else if(strcmp($id4, "LeM")== 0)
		{
			$sql = "Select DID, Dept_Name, Manager_SIN, PID, Proj_Name from Department, Project where Manager_SIN = Leader_SIN;";
		}
		else if(strcmp($id4, "ManIn")== 0)
		{
			$sql = "Select Department.DID, Dept_Name, Manager_SIN, Employee_Name, Salary from Employee, Department where Employee_SIN = Manager_SIN;";
		}







		if(strcmp($id, "Employee") == 0)
		{
			$sql = "Select * From $id;";
		}
		else if(strcmp($id, "Department") == 0)
		{
			$sql = "Select * From $id;";
		}
		else if(strcmp($id, "Project") == 0)
		{
			$sql = "Select * From $id;";
		}
		else if(strcmp($id, "WorksOn") == 0)
		{
			$sql = "Select * From $id;";
		}
		else if(strcmp($id, "SuperVising") == 0)
		{
			$sql = "Select * From $id;";
		}
		else if(strcmp($id, "Phone") == 0)
		{
			$sql = "Select * From $id;";
		}
		else if(strcmp($id, "Dependent") == 0)
		{
			$sql = "Select * From $id;";
		}
		else if(strcmp($id, "Location") == 0)
		{
			$sql = "Select * From $id;";
		}
		


		$date = new Date();

		if($sql != "")
		{
			$result = mysqli_query($conn, $sql);
			
			
			if($prog != "")
			{	
				$date1 = "";
				$date2 = "";
				$count = 0;
				$tableCheck = false;
				while($row = mysqli_fetch_assoc($result))
				{
					foreach($row as $k => $v)
					{
						if($count == 0)
						{
							$date1 = $v;
							$count += 1;
						}
						else if($count == 1)
						{
							$date2 = $v;
						}
				
					}
				}
				echo $date->Progress($date1, $date2);
			}
			else 
			{
				//$myfile = fopen("insertDepartment.txt", w);
				$count = 0;
				$goal = false;
				$tableCheck = true;
				$data = array();
				
				while($row = mysqli_fetch_assoc($result))
				{
					$data[] = $row;
					foreach($row as $k => $v)
					{
						//echo $k . "->" . $v . " ";
						if($ageTest)
						{
							$today = date("Y-m-d");
							$age += $date->Diff($v, $today);
							$count += 1;
							$avgAge = floor($age/365);
							$tableCheck = false;
						}
						/*if(strcmp($k, "DID") == 0)
						{
							//if($v == null)
							//{
							//	$v = 15;
							//}
							$EMP = "$v";
							
						}
						else if(strcmp($k, "Dept_Name") == 0)
						{
							$EMP .= ", \"$v\"";
							$goal = true;
							
						}
						else if(strcmp($k, "Phone_Type") == 0)
						{
							$EMP .= ", \"$v\"";
							//$goal = true;
						}
						else if(strcmp($k, "Address") == 0)
						{
							//$EMP .= ", \"$v\"";
							//$goal = true;
						}
						else if(strcmp($k, "Gender") == 0)
						{
							//$EMP .= ", \"$v\"";
							//$goal = true;
						}
						else if(strcmp($k, "Relationship") == 0)
						{
							//$EMP .= ", \"$v\"";
							//$goal = true;
						}
						else if(strcmp($k, "Employee_SIN") == 0)
						{
							//$EMP .= ", \"$v\"";
							//$goal = true;
						}
						
						if(strcmp($store, $EMP) != 0 && $goal)
						{
							$text = "INSERT INTO Department (DID, Dept_Name) VALUES ($EMP);\n";
							$store = $EMP;						
							$count += 1;
							$goal = false;
							fwrite($myfile, $text);
						}*/
				
					}
					//echo '<br>';
				}
				
				if($ageTest && (!$man))
				{
					$avgAge = floor($avgAge/$count);
				}


				if(reset($data) != null)
				{	
					$colNames = array_keys(reset($data));
				}
				else
				{
					$tableCheck = false;
				}
				

				//fclose($myfile);
			}
		}	
	
	?>

	<table border="1">
	 <tr>
	    <?php
		if($tableCheck)
		{
		       //print the header
		       foreach($colNames as $colName)
		       {
			  echo "<th>$colName</th>";
		       }
		}
	    ?>
	 </tr>

	    <?php
		if($tableCheck)
		{
		       //print the rows
		       foreach($data as $row)
		       {
			  echo "<tr>";
			  foreach($colNames as $colName)
			  {
			     echo "<td>".$row[$colName]."</td>";
			  }
			  echo "</tr>";
		       }
		}
		else if($ageTest)
		{
			if(!$man)
			{
				echo "<br>The Average Age is $avgAge <br>";
			}
			else
			{
				echo "<br>This Department has been Managed by the same Manager for $avgAge Years<br>";
			}
		}
		else
		{
			echo "<br>No Values returned by Query<br>";
		}
		
	    ?>
	 </table>


 </body>
</html> 
					

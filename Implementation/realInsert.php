<!DOCTYPE html>
<html>
	<body>

		<?php
			
			
			include 'realParser.php';
			
			
			Class RealInserting
			{
				public function insertRealEmp(Person $con)
				{
					$EMP = $con->toString($con);
				
					$text = "INSERT INTO Employee (Employee_SIN, Gender, Salary, Address, Employee_Name, DateOfBirth, DID) VALUES ($EMP);\n";
					
					return $text;
				}
			
				
				public function insertRealDep(Department $con)
				{
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO Department (DID, Dept_Name, Manager_SIN, Manager_StartDate) VALUES ($EMP);\n";
						
					return $text;
				}
			
			
				public function insertRealProj(Project $con)
				{
					$EMP = $con->toString($con);
				
					$text = "INSERT INTO Project (PID, Proj_Name, Proj_StartDate, DeadLine, Leader_SIN, LID) VALUES ($EMP);\n";
					
					return $text;
				}
				
				
				
				public function insertRealWO(WorkOn $con)
				{
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO WorksOn (Hours, Employee_SIN, PID) VALUES ($EMP);\n";
						
					return $text;
				}
				
				public function insertRealControl(Control $con)
				{
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO Control (DID, PID) VALUES ($EMP);\n";
						
					return $text;
				}
				
				public function insertRealWF(WorkFor $con)
				{
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO WorksFor (Employee_SIN, DID) VALUES ($EMP);\n";
						
					return $text;
				}
				
				public function insertRealManages(Manages $con)
				{
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO Manages (Employee_SIN, DID, StartDate) VALUES ($EMP);\n";
						
					return $text;
				}
				
				public function insertRealLeads(Leads $con)
				{
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO Leads (PID, Employee_SIN) VALUES ($EMP);\n";
						
					return $text;
				}
				
				
				public function insertRealSuperVising(RealSuper $con)
				{
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO SuperVising (Sub_SIN, Sup_SIN) VALUES ($EMP);\n";
						
					return $text;
				}
				
				public function insertRealPhone(Phone $con)
				{
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO Phone (Phone_Number, Employee_SIN, Phone_Type) VALUES ($EMP);\n";
						
					return $text;
				}
				
				
				
				public function insertRealLocation(RealLocation $con)
				{		
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO Location (LID, DID, Address) VALUES ($EMP);\n";
						
					return $text;
				}


				public function insertRealLoc_Dep(Loc_Dep $con)
				{		
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO Loc_Dep (LID, DID) VALUES ($EMP);\n";
						
					return $text;
				}

				public function insertRealLoc_Pro(Loc_Pro $con)
				{		
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO Loc_Pro (LID, PID) VALUES ($EMP);\n";
						
					return $text;
				}
				
				
				public function insertRealDependent(RealDependent $con)
				{
					
					$EMP = $con->toString($con);
					
					$text = "INSERT INTO Dependent (Dep_SIN, Dep_Name, DateOfBirth, Address, Gender, Relationship, Employee_SIN) VALUES ($EMP);\n";
						
					return $text;
					
				}
				
				public function modifyRealEmployee($sin, $name, $add, $dob, $gen, $sal, $esin)
				{
					if($gen != "")
					{
						$genI = ", Gender = \"$gen\"";
					}
					else 
					{
						$genI = "";
					}
			
					if($sal != "")
					{
						$salI = ", Salary = $sal";
					}
					else 
					{
						$salI = "";
					}
			
					if($add != "")
					{
						$addI = ", Address = \"$add\"";
					}
					else 
					{
						$addI = "";
					}
			
					if($name != "")
					{
						$nameI = ", Employee_Name = \"$name\"";
					}
					else 
					{
						$nameI = "";
					}
			
					if($dob != "")
					{
						$dobI = ", DateOfBirth = \"$dob\"";
					}
					else 
					{
						$dobI = "";
					}

					if($esin != "")
					{
						$esinI = ", DID = $esin";
					}
					else 
					{
						$esinI = "";
					}

					return "UPDATE Employee SET Employee_SIN = \"$sin\" $genI $salI $addI $nameI $dobI $esinI WHERE Employee_SIN = \"$sin\";";
				}
				
				public function modifyRealWO($sin, $name, $add, $dob, $gen, $sal)
				{
					if($add != "")
					{
						$addI = "Hours = $add,";
					}
					else 
					{
						$addI = "";
					}
					
					return "UPDATE WorksOn SET $addI Employee_SIN = \"$sin\", PID = $name WHERE Employee_SIN = \"$sin\" AND PID = $name;";
					
				}
				
				public function modifyRealManages($sin, $name, $add, $dob, $gen, $sal)
				{
					if($add != "")
					{
						$addI = ", Start_Date = $add";
					}
					else 
					{
						$addI = "";
					}
					
					if($name != "")
					{
						$nameI = "DID = $name";
					}
					else
					{
						$nameI = "";
					}
					
					return "UPDATE Manages SET Employee_SIN = \"$sin\", $nameI $addI WHERE Employee_SIN = \"$sin\";";	
				}
				
				public function modifyRealDependent($sin, $name, $add, $dob, $gen, $sal, $esin)
				{
					if($gen != "")
					{
						$genI = ", Gender = \"$gen\"";
					}
					else 
					{
						$genI = "";
					}
			
					if($sal != "")
					{
						$salI = ", Relationship = \"$sal\"";
					}
					else 
					{
						$salI = "";
					}
			
					if($add != "")
					{
						$addI = ", Address = \"$add\"";
					}
					else 
					{
						$addI = "";
					}
			
					if($name != "")
					{
						$nameI = ", Dep_Name = \"$name\"";
					}
					else 
					{
						$nameI = "";
					}
			
					if($dob != "")
					{
						$dobI = ", DateOfBirth = \"$dob\"";
					}
					else 
					{
						$dobI = "";
					}
					
					if($sin != "")
					{
						$sinI = ", Employee_SIN = \"$sin\"";
					}
					else
					{
						$sinI = "";
					}

					
					return "UPDATE Dependent SET Dep_SIN = \"$esin\" $nameI $dobI $addI $genI $sinI WHERE Dep_SIN = \"$esin\";";
				}
				
				public function modifyRealPhone($sin, $name, $add, $dob, $gen, $sal)
				{
					if($add != "")
					{
						$addI = ", Phone_Type = \"$add\"";
					}
					else 
					{
						$addI = "";
					}
					
					if($name != "")
					{
						$nameI = "Phone_Number = \"$name\",";
					}
					else
					{
						$nameI = "";
					}
					
					return "UPDATE Phone SET $nameI Employee_SIN = \"$sin\" $addI WHERE Employee_SIN = \"$sin\";";
				}
				
				public function modifyRealProject($sin, $name, $add, $dob, $gen, $sal)
				{
					if($add != "")
					{
						$addI = ", DeadLine = \"$add\"";
					}
					else 
					{
						$addI = "";
					}
					
					if($name != "")
					{
						$nameI = ", Proj_Name = \"$name\"";
					}
					else
					{
						$nameI = "";
					}
					
					if($dob != "")
					{
						$dobI = ", Proj_StartDate = \"$dob\"";
					}
					else
					{
						$dobI = "";
					}

					if($gen != "")
					{
						$genI = ", Leader_SIN = \"$gen\"";
					}
					else
					{
						$genI = "";
					}

					if($sal != "")
					{
						$salI = ", LID = $dob";
					}
					else
					{
						$salI = "";
					}
					
					if($addI != "" || $dobI != "")
					{
						$sql = "UPDATE Project SET PID = \"$sin\" $nameI $dobI $addI $genI $salI WHERE PID = \"$sin\"";
					}
					

					return $sql;
					
				}
				
				public function modifyRealLocation($sin, $name, $add, $dob, $gen, $sal)
				{
					if($sin != "")
					{
						$sinI = ", DID = $sin";
					}
					else 
					{
						$sinI = "";
					}

					if($name != "")
					{
						$nameI = ", Address = \"$name\"";
					}
					else 
					{
						$nameI = "";
					}
					
					return "UPDATE Location SET LID = $add $nameI $sinI WHERE LID = $add;";
					
				}

				public function modifyRealLoc_Dep($sin, $name, $add, $dob, $gen, $sal)
				{
					if($name != "")
					{
						$nameI = "DID = $name,";
					}
					else 
					{
						$nameI = "";
					}
					
					return "UPDATE Loc_Dep SET $nameI LID = $sin WHERE LID = $sin;";
					
				}

				public function modifyRealLoc_Pro($sin, $name, $add, $dob, $gen, $sal)
				{
					if($name != "")
					{
						$nameI = "PID = $name,";
					}
					else 
					{
						$nameI = "";
					}
					
					
					return "UPDATE Loc_Pro SET $nameI LID = $sin WHERE LID = $sin;";
					
				}

				public function modifyRealLeads($sin, $name, $add, $dob, $gen, $sal)
				{
					
					return "UPDATE Leads SET Employee_SIN = \"$name\", PID = $sin WHERE PID = $sin;";
					
				}

				public function modifyRealDep($sin, $name, $add, $dob, $gen, $sal)
				{
					
					if($name != "")
					{
						$nameI = ", Dept_Name = \"$name\"";
					}
					else 
					{
						$nameI = "";
					}
					
					if($add != "")
					{
						$addI = ", Manager_SIN = \"$add\"";
					}
					else
					{
						$addI = "";
					}
					
					if($dob != "")
					{
						$dobI = ", Manager_StartDate = \"$dob\"";
					}
					else
					{
						$dobI = "";
					}
					
					return "UPDATE Department SET DID = $sin $nameI $addI $dobI WHERE DID = $sin;";
					
				}
								
			}
			
			$ins = new RealInserting();
			
			/*$ins->insertRealEmp($con); 
			$ins->insertRealDep($con); 
			$ins->insertRealProj($con);
			$ins->insertRealWO($con);
			$ins->insertRealControl($con);
			$ins->insertRealWF($con);
			$ins->insertRealManages($con);
			$ins->insertRealSuperVising($con);
			$ins->insertRealPhone($con);
			$ins->insertRealLocation($con);
			$ins->insertRealDependent($con);*/
			
			//echo "finished";
		?>
	</body>
</html>






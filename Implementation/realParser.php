<!DOCTYPE html>
<html>
	<body>
		<?php
	
			include "Classs.php";
			
			
			
			Class RealParser
			{	
				public function test()
				{
					return "hh";
				}
				
				public function Control($sin, $name, $add, $dob, $gen, $sal)
				{
					$sin = intval(str_replace(' ', '', $sin));
					$name = intval(str_replace(' ', '', $name));
					$person = new Control($sin, $name);
					return $person;

				}
		
				public function Employee($sin, $name, $add, $dob, $gen, $sal, $esin)
				{
					$sal = intval(str_replace(' ', '', $sal));
					$person = new Person($sin, $name, $add, $dob, $gen, $sal, $esin);
					
					return $person;

				}
		
				public function Dependent($sin, $name, $add, $dob, $gen, $sal, $sins)
				{ 
					$person = new RealDependent($sin, $name, $add, $dob, $gen, $sal, $sins);
					return $person;
				}
			
				public function Location($sin, $name, $add, $dob, $gen, $sal)
				{
					$sin = intval(str_replace(' ', '', $sin));
					$add = intval(str_replace(' ', '', $add));
					$person = new RealLocation($sin, $name, $add);
					return $person;
				}

				public function Loc_Dep($sin, $name, $add, $dob, $gen, $sal)
				{
					$sin = intval(str_replace(' ', '', $sin));
					$name = intval(str_replace(' ', '', $name));
					$person = new Loc_Dep($sin, $name);
					return $person;
				}

				public function Loc_Pro($sin, $name, $add, $dob, $gen, $sal)
				{
					$sin = intval(str_replace(' ', '', $sin));
					$name = intval(str_replace(' ', '', $name));
					$person = new Loc_Pro($sin, $name);
					return $person;
				}
			
				public function Manages($sin, $name, $add, $dob, $gen, $sal)
				{
					$name = intval(str_replace(' ', '', $name));
					$person = new Manages($sin, $name, $add, $dob);
					return $person;
				}
				
				public function Leads($sin, $name, $add, $dob, $gen, $sal)
				{
					$sin = intval(str_replace(' ', '', $sin));
					$person = new Leads($sin, $name);
					return $person;
				}
			
				public function Phone($sin, $name, $add, $dob, $gen, $sal)
				{
					$person = new Phone($sin, $name, $add);
					return $person;	
				}
			
				public function Project($sin, $name, $add, $dob, $gen, $sal)
				{
					$sin = intval(str_replace(' ', '', $sin));
					$sal = intval(str_replace(' ', '', $sal));
					$person = new Project($sin, $name, $add, $dob, $gen, $sal);
					return $person;
				}
			
				public function Project2($sin, $name, $add, $dob, $gen, $sal)
				{
					$person = new Project2($sin, $name, $add);
					return $person;
				}

				public function SuperVisor($sin, $name, $add, $dob, $gen, $sal)
				{
					
					$person = new RealSuper($sin, $name);
					return $person;
				}
			
				public function WF($sin, $name, $add, $dob, $gen, $sal)
				{
					$name = intval(str_replace(' ', '', $name));
					$person = new WorkFor($sin, $name, $add);
					return $person;
				}
			
				public function WO($sin, $name, $add, $dob, $gen, $sal)
				{
					$name = intval(str_replace(' ', '', $name));
					$dob = intval(str_replace(' ', '', $dob));
					$person = new WorkOn($sin, $name, $add, $dob);
					return $person;
				}
			
				public function Department($sin, $name, $add, $dob, $gen, $sal)
				{
					$sin = intval(str_replace(' ', '', $sin));
					$person = new Department($sin, $name, $add, $dob);
					return $person;
				}
			}
			
			//echo "finished";
		?>
	</body>
</html>

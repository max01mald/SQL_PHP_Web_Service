
<?php
	
	include "DateSwitch.php";
	
	class Person 
	{
            
    	public $SIN = "";
        public $Name = "";
        public $Address = "";
        public $DOB = "";
        public $Gender = "";
        public $Salary = 0;
	public $DID = 0;
            
            
        public function __construct($sin, $name, $add, $dob, $gen, $sal, $did) 
        {
            $this->SIN = $sin;
            $this->Name = $name;
            $this->Address = $add;
            $this->DOB = $dob;
            $this->Gender = $gen;
            $this->Salary = $sal;
	    $this->DID = $did;
        }
           
        public function toString(Person $per) 
        {
        	$sin = "SIN";
        	$name = "Name";
        	$add = "Address";
        	$dob = "DOB";
        	$gen = "Gender";
        	$sal = "Salary";
        	$did = "DID";
        	
        	return  '"' . $per->$sin . '"' . ", " .  '"' . $per->$gen . '"' . ", " . $per->$sal . ", " . '"' . $per->$add . '"' . ", " . '"' . $per->$name . '"' . ", " . '"' . $per->$dob .'"' . ", " . '"' . $per->$did . '"' ;
        }
    }
    
   
    
    class Control 
	{
            
    	public $DID = "";
        public $DName = "";
        public $PID = "";
        public $PName = "";
            
            
        public function __construct($pid, $did)
        {
            $this->DID = $did;
            //$this->DName = $dname;
            $this->PID = $pid;
            //$this->PName = $pname;
        }
           
        public function toString(Control $con) 
        {
        	$did = "DID";
        	$dname = "DName";
        	$pid = "PID";
        	$pname = "PName";
        	
        	return $con->$did . ", " . $con->$pid;
        }
    }
        
    class Dependent 
	{
            
    	public $SIN = "";
        public $Name = "";
        public $DOB = "";
        public $Gender = "";
        public $Relation = "";
            
            
        public function __construct($sin, $name, $dob, $gen, $rel) 
        {
            $this->SIN = $sin;
            $this->Name = $name;
            $this->DOB = $dob;
            $this->Gender = $gen;
            $this->Relation = $rel;
        }
           
        public function toString(Dependent $per, String $esin, String $rel, String $add) 
        {
        	$sin = "SIN";
        	$name = "Name";
        	$dob = "DOB";
        	$gen = "Gender";
        	
        	/*$date = new Date();
        	
        	$per->$dob = $date->Conv($per->$dob);
        	
        	if($per->$gen{0} == "M")
        	{
        		$per->$gen = "M";
        	}
        	else
        	{
        		$per->$gen = "F";
        	}*/
        	
        	return '"' . $per->$sin .  '"' . ", " . '"' . $per->$name . '"' . ", " . '"' . $per->$dob . '"' . ", " . '"' . $add . '"' . ", " . '"' . $per->$gen . '"' . ", " . '"' . $rel . '"' . ", " . '"' . $esin . '"';
        }
    }
    
    class RealDependent
	{
            
    	public $SIN = "";
        public $Name = "";
        public $DOB = "";
        public $Gender = "";
        public $Relation = "";
        public $Address = "";
        public $ESIN = "";
            
            
        public function __construct($sin, $name, $add, $dob, $gen, $rel, $esin) 
        {
            $this->SIN = $sin;
            $this->Name = $name;
            $this->DOB = $dob;
            $this->Gender = $gen;
            $this->Relation = $rel;
            $this->Address = $add;
            $this->ESIN = $esin;
            
           
        }
           
        public function toString(RealDependent $per) 
        {
        	$sin = "SIN";
        	$name = "Name";
        	$dob = "DOB";
        	$gen = "Gender";
        	$rel = "Relation";
        	$add = "Address";
        	$esin = "ESIN";
        	
        	return '"' . $per->$esin .  '"' . ", " . '"' . $per->$name . '"' . ", " . '"' . $per->$dob . '"' . ", " . '"' . $per->$add . '"' . ", " . '"' . $per->$gen . '"' . ", " . '"' . $per->$rel . '"' . ", " . '"' . $per->$sin . '"';
        }
    }
        
    class DependsOf 
	{
            
    	public $SIN = "";
        public $SIND = "";
        public $Relation = "";
		
		 
        public function __construct($sin, $sind, $rel)
        {
            $this->SIN = $sin;
            $this->SIND = $sind;
            $this->Relation = $rel;
        }
           
        public function toString(DependsOf $per) 
        {
        	$sin = "SIN";
        	$sind = "SIND";
        	$rel = "Relation";
        	
        	return $per->$sin . " " . $per->$sind . " " . '"' . $per->$rel . '"';
        }
    }
    
    
    class DepLoc 
	{
            
    	public $DID = "";
        public $DName = "";
        public $LID = "";
        
        public function __construct($did, $Dname, $lid)
        {
            $this->DID = $did;
            $this->DName = $Dname;
            $this->LID = $lid;
           
        }
           
        public function toString(DepLoc $per) 
        {
        	$did = "DID";
        	$Dname = "DName";
        	$lid = "LID";
        	
        	return $per->$did . " " . '"' . $per->$Dname . '"' . " " . $per->$lid;
        }
    }
    
    class RealLocation 
	{
            
    	public $LID = "";
	public $DID = "";
        public $location = "";
            
        public function __construct($did, $loc, $lid)
        {
            $this->LID = $lid;
	    $this->DID = $did;
            $this->location = $loc;
            
        }
           
        public function toString(RealLocation $per) 
        {
        	$lid = "LID";
        	$loc = "location";
        	$did = "DID";
        	
        	return  $per->$lid . ", " . $per->$did . ", " . '"' . $per->$loc . '"';
        }
    }
    
    
    
    
    class Leads 
	{
            
    	public $PID = "";
        public $SIN = "";
       
            
        public function __construct($pid, $sin)
        {
            
            $this->PID = $pid;
            $this->SIN = $sin;
        }
           
        public function toString(Leads $per) 
        {
        	$pid = "PID";
        	$sin = "SIN";
        	
        	return $per->$pid . ", " . '"' . $per->$sin . '"' ;
        }
    }

    class Loc_Pro 
	{
            
    	public $LID = "";
        public $PID = "";
            
        public function __construct($lid, $pid)
        {
            $this->LID = $lid;
            $this->PID = $pid;
        }
           
        public function toString(Loc_Pro $per) 
        {
        	$lid = "LID";
        	$pid = "PID";
        	
        	return $per->$lid . ", " .  $per->$pid;
        }
    }

    class Loc_Dep
	{
            
    	public $LID = "";
        public $DID = "";
            
        public function __construct($lid, $pid)
        {
            $this->LID = $lid;
            $this->DID = $pid;
        }
           
        public function toString(Loc_Dep $per) 
        {
        	$lid = "LID";
        	$did = "DID";
        	
        	return $per->$lid . ", " .  $per->$did;
        }
    }
    
    class Manages 
	{
            
    	public $SIN = "";
        public $DID = "";
        public $DName = "";
        public $SD = "";
        
            
        public function __construct($sin, $did, $sd)
        {
            $this->SIN = $sin;
            $this->DID = $did;
            $this->SD = $sd;
            
        }
           
        public function toString(Manages $per) 
        {
        	$sin = "SIN";
        	$did = "DID";
        	$dname = "DName";
        	$sd = "SD";
        	
        	/*$date = new Date();
        	
        	$per->$sd = $date->Conv($per->$sd);*/
        	
        	
        	return '"' . $per->$sin . '"' . ", " . $per->$did . ", " . '"' . $per->$sd .'"';
        }
    }
    
        
    class Phone 
	{
            
    	public $SIN = "";
        public $Number = "";
        public $Type = "";
        
            
        public function __construct($sin, $num, $ty)
        {
            $this->SIN = $sin;
            $this->Number = $num;
            $this->Type = $ty;
           
        }
           
        public function toString(Phone $per) 
        {
        	$sin = "SIN";
        	$num = "Number";
        	$ty = "Type";
        	
        	
        	return '"' . $per->$num . '"' . ", " . '"' . $per->$sin . '"' . ", " . '"' . $per->$ty . '"';
        }
    }
    
   
    class Project 
	{
            
    	public $PID = "";
        public $PName = "";
        public $DL = "";
        public $SD = "";
	public $LSIN = "";
	public $LID = "";
        
        
        public function __construct($pid, $pname, $dl, $sd, $lsin, $lid)
        {
            $this->PID = $pid;
            $this->PName = $pname;
            $this->DL = $dl;
            $this->SD = $sd;
	    $this->LSIN = $lsin;
	    $this->LID = $lid;
           
	   
            
        }
           
        public function toString(Project $per) 
        {
        	$pid = "PID";
        	$pname = "PName";
        	$dl = "DL";
        	$sd = "SD";
		$lsin = "LSIN";
		$lid = "LID";
        	
		
        	return $per->$pid . ", " . '"' . $per->$pname . '"' . ", " . '"' . $per->$sd . '"' . ", " . '"' . $per->$dl . '"' . ", " . '"' . $per->$lsin . '"' . ", " . $per->$lid;
        }
    }


    class Project2 
	{
            
    	public $PID = "";
        public $PName = "";
        public $DL = "";
        public $SD = "";
        
        
        public function __construct($pname, $dl, $sd)
        {
            
            $this->PName = $pname;
            $this->DL = $dl;
            $this->SD = $sd;
           
	    echo $sd; 
            
        }
           
        public function toString(Project2 $per) 
        {
        	
        	$pname = "PName";
        	$dl = "DL";
        	$sd = "SD";
        	
		
        	return $per->$pname . '"' . ", " . '"' . $per->$dl . '"' . "," . '"' . $per->$sd . '"';
        }
    }
        
    class Super 
	{
            
    	public $SIN = "";
        public $SINSup = "";
		
        public function __construct($sin, $sins)
        {
            $this->SIN = $sin;
            $this->SINSup = $sins;
        }
           
        public function toString(Super $per, String $emp) 
        {
        	$sin = "SIN";
        	$sins = "SINSup";
        	
        	return '"' . $per->$sin . '"' . ", " . '"' . $emp. '"';
        }
    }
    
    class RealSuper
	{
            
    	public $SIN = "";
        public $SINSup = "";
		
        public function __construct($sin, $sins)
        {
            $this->SIN = $sin;
            $this->SINSup = $sins;
            
        }
           
        public function toString(RealSuper $per) 
        {
        	$sin = "SIN";
        	$sins = "SINSup";
        	
        	
        	return '"' . $per->$sin . '"' . ", " . '"' . $per->$sins . '"';
        }
    }
    

    class WorkFor 
	{
            
    	public $SIN = "";
        public $DID = "";
        public $DName = "";
       	
        public function __construct($sin, $did, $dname)
        {
            $this->SIN = $sin;
            $this->DID = $did;
            $this->DName = $dname;
        }
           
        public function toString(WorkFor $per) 
        {
        	$sin = "SIN";
        	$did = "DID";
        	$dname = "DName";
        	
        	
        	return '"' . $per->$sin . '"' . ", " . $per->$did;
        }
    }
        
    class WorkOn
	{
            
    	public $SIN = "";
        public $PID = "";
        public $PName = "";
        public $Hours = "";
       	
        public function __construct($sin, $pid, $hour)
        {
            $this->SIN = $sin;
            $this->PID = $pid;
            $this->Hours = $hour;
        }
           
        public function toString(WorkOn $per) 
        {
        	$sin = "SIN";
        	$pid = "PID";
        	$pname = "PName";
        	$hour = "Hours";
        	
        	
        	return $per->$hour . ", " . '"' . $per->$sin . '"' . ", " . $per->$pid;
        }
    }
    
    class Department
	{
            
    	public $DID = "";
        public $DName = "";
        public $ESIN = "";
	public $SD = "";
       	
        public function __construct($did, $dname, $sin, $sd)
        {
            $this->DID = $did;
            $this->DName = $dname;
	    $this->ESIN = $sin;
	    $this->SD = $sd;
           
        }
           
        public function toString(Department $per) 
        {
        	$did = "DID";
        	$dname = "DName";
		$sin = "ESIN";
		$sd = "SD";
        	
        	return $per->$did . ", " . '"' . $per->$dname . '"' . ", " . '"' . $per->$sin . '"' . ", " . '"' . $per->$sd . '"';
        }
    }
    
                   
    class Container
    {
    	public $Cont = array();
    	public $Emp = array();
    	public $Depen = array();
    	public $DepO = array();
    	public $DepLoc = array();
    	public $Loc = array();
    	public $Man = array();
		public $Pho = array();
		public $Proj = array();
		public $Sup = array();
		public $WF = array();
		public $WO = array();
		public $Depart = array();
		
		public function __construct($cont, $emp, $depen, $depo, $deploc, $loc, $man, $pho, $proj, $sup, $wf, $wo, $depart)
        {
            $this->Cont = $cont;
            $this->Emp = $emp;
            $this->Depen = $depen;
            $this->DepO = $depo;
            $this->DepLoc = $deploc;
            $this->Loc = $loc;
            $this->Man = $man;
            $this->Pho = $pho;
            $this->Proj = $proj;
            $this->Sup = $sup;
            $this->WF = $wf;
            $this->WO = $wo;
            $this->Depart = $depart;
            
            
        }
        
        public function Cont(Container $con) 
        {
        	$cont = "Cont";
        	
        	return $con->$cont;
        }
        
        public function Emp(Container $con) 
        {
        	$emp = "Emp";
        	
        	return $con->$emp;
        }
        
        public function Depen(Container $con) 
        {
        	$depen = "Depen";
        	
        	return $con->$depen;
        }
        
        public function DepO(Container $con) 
        {
        	$depo = "DepO";
        	
        	return $con->$depo;
        }
        
        public function DepLoc(Container $con) 
        {
        	$depl = "DepLoc";
        	
        	return $con->$depl;
        }
        
        public function Loc(Container $con) 
        {
        	$loc = "Loc";
        	
        	return $con->$loc;
        }
        
        public function Man(Container $con) 
        {
        	$man = "Man";
        	
        	return $con->$man;
        }
        
        public function Pho(Container $con) 
        {
        	$pho = "Pho";
        	
        	return $con->$pho;
        }
        
        public function Proj(Container $con) 
        {
        	$proj = "Proj";
        	
        	return $con->$proj;
        }
        
        public function Sup(Container $con) 
        {
        	$sup = "Sup";
        	
        	return $con->$sup;
        }
        
        public function WF(Container $con) 
        {
        	$wf = "WF";
        	
        	return $con->$wf;
        }
        
        public function WO(Container $con) 
        {
        	$wo = "WO";
        	
        	return $con->$wo;
        }
        
        public function Dep(Container $con) 
        {
        	$depart = "Depart";
	
        	return $con->$depart;
        }
        
        public function prints(Container $con)
        {
        	echo "Cont <br>";
        	for($i=0; $i<count($con->Cont); $i++)
			{
				echo $con->Cont[$i]->toString($con->Cont[$i]) . "<br>";
				
			}
			echo "Empl <br>";
			for($i=0; $i<count($con->Emp); $i++)
			{
				echo $con->Emp[$i]->toString($con->Emp[$i]) . "<br>";
				
			}
			
			echo "Man <br>";
			for($i=0; $i<count($con->Man); $i++)
			{
				echo $con->Man[$i]->toString($con->Man[$i]) . "<br>";
				
			}
			
			echo "Pho <br>";
			for($i=0; $i<count($con->Pho); $i++)
			{
				echo $con->Pho[$i]->toString($con->Pho[$i]) . "<br>";
				
			}
			
			echo "Proj <br>";
			for($i=0; $i<count($con->Proj); $i++)
			{
				echo $con->Proj[$i]->toString($con->Proj[$i]) . "<br>";
				
			}
			
			echo "WF <br>";
			for($i=0; $i<count($con->WF); $i++)
			{
				echo $con->WF[$i]->toString($con->WF[$i]) . "<br>";
				
			}
			
			echo "WO <br>";
			for($i=0; $i<count($con->WO); $i++)
			{
				echo $con->WO[$i]->toString($con->WO[$i]) . "<br>";
				
			}
			
			echo "Sup <br>";
			for($i=0; $i<count($con->Sup); $i++)
			{
				echo $con->Sup[$i]->toString($con->Sup[$i], "11") . "<br>";
				
			}
			
			echo "Depart <br>";
			for($i=0; $i<count($con->Depart); $i++)
			{
				echo $con->Depart[$i]->toString($con->Depart[$i]) . "<br>";
				
			}
			
			echo "Depen <br>";
			for($i=0; $i<count($con->Depen); $i++)
			{
				echo $con->Depen[$i]->toString($con->Depen[$i]) . "<br>";
				
			}
			
			
			echo "Loc <br>";
			for($i=0; $i<count($con->Loc); $i++)
			{
				echo $con->Loc[$i]->toString($con->Loc[$i]) . "<br>";
				
			}
			
			
			
        
        }
        
		
		
    }
    
  
?>

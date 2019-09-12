<!DOCTYPE html>
<html>
	<body>
		<?php
			
			Class Date
			{
				public $Day = "";
				public $Month = "";
				public $Year = "";
				
				
				public function Conv($string)
				{
					$day = substr($string, 0, 2);
					$month = substr($string, 3, 2);
					$year = substr($string, 6, strlen($string));
			
					if($year{0} == "0" || $year{0} == "1")
					{
						$year = "20" . $year;
					}
					else
					{
						$year = "19" . $year;
					}
						
					return $year . "-" . $month . "-" . $day;
				}
				
				
				public function Year($string)
				{
					$count = 0;
					
					for($i=0; $i<strlen($string); $i++)
					{
						if($string{$i} == '-')
						{
							return substr($string, 0, $i);
						}
						
					}
				}
				
				
				public function Month($string)
				{
					$count = 0;
					$hold = 0;
					
					for($i=0; $i<strlen($string); $i++)
					{
						if($string{$i} == '-')
						{
							if($count == 0)
							{
								$hold = $i;
							}
							$count += 1;
						}
						
						if($count == 2)
						{
							
							$string = substr($string, $hold+1, $i-5);
							
							if($string{strlen($string-1)} == '-')
							{
								return $string = rtrim($string, "-");
							}
							else return $string;
						}
						
					}
				}
				
				public function Day($string)
				{
					$count = 0;
					$hold = 0;
					
					for($i=0; $i<strlen($string); $i++)
					{
						if($string{$i} == '-')
						{
							if($count != 2)
							{
								$hold = $i;
							}
							$count += 1;
						}
						
						if($count == 2)
						{
							
							return substr($string, $i+1, strlen($string));
						}
						
					}
				}
				
				public function Diff($string, $string2)
				{
					$date = new Date();
					
					$day = $date->Day($string);
					$month = $date->Month($string);
					$year = $date->Year($string);
					
					$day2 = $date->Day($string2);
					$month2 = $date->Month($string2);
					$year2 = $date->Year($string2);
					
					$day = intval($day);
					$month = intval($month);
					$year = intval($year);
					
					$day2 = intval($day2);
					$month2 = intval($month2);
					$year2 = intval($year2);
					
					$daydiff = $day2 - $day;
					$monthdiff = ($month2 - $month) * 30; 
					$yeardiff = ($year2 - $year) * 365;
					
					$total = $daydiff + $monthdiff + $yeardiff;
					
					return $total;
				
				}
				
				public function Progress($string, $string2)
				{
					$date = new Date();
					
					$day = $date->Day($string);
					$month = $date->Month($string);
					$year = $date->Year($string);
					
					$day2 = $date->Day($string2);
					$month2 = $date->Month($string2);
					$year2 = $date->Year($string2);

					$day = intval($day);
					$month = intval($month);
					$year = intval($year);
					
					$day2 = intval($day2);
					$month2 = intval($month2);
					$year2 = intval($year2);
					
					$daydiff = $day2 - $day;
					$monthdiff = ($month2 - $month) * 30; 
					$yeardiff = ($year2 - $year) * 365;
					
					$total = $daydiff + $monthdiff + $yeardiff;
					
					$segment = floor($total / 4);
					
					$year3 = floor($segment/365);
					
					$segment -= $year3*365;
					
					$month3 = floor($segment/30);
					$segment -= $month3*30;
					
					$day3 = $segment;
					
					$yearone = $year + $year3;
					
					$monthone = $month + $month3;
					
					while($monthone > 12)
					{
						$monthone -= 12;
						$yearone +=1; 	
					}
					
					$dayone = $day + $day3;
					
					while($dayone > 30)
					{
						$dayone -= 30;
						$monthone +=1; 	
					}
					
					$yeartwo = $year + $year3*2;
					
					$monthtwo = $month + $month3*2;
					
					while($monthtwo > 12)
					{
						$monthtwo -= 12;
						$yeartwo +=1; 	
					}
					
					$daytwo = $day + $day3 *2;
					
					while($daytwo > 30)
					{
						$daytwo -= 30;
						$monthtwo +=1; 	
					}
					
					$yearthree = $year + $year3*3;
					
					$monththree = $month + $month3*3;
					
					while($monththree > 12)
					{
						$monththree -= 12;
						$yearthree +=1; 	
					}
					
					$daythree = $day + $day3 *3;
					
					while($daythree > 30)
					{
						$daythree -= 30;
						$monththree +=1; 	
					}
					
					$one = $yearone . "-" . $monthone . "-" . $dayone;
					$two = $yeartwo . "-" . $monthtwo . "-" . $daytwo;
					$three = $yearthree . "-" . $monththree . "-" . $daythree;
					
					$today = date("Y-m-d");
					
					$c1  = $date->Diff($today, $one);
					$c2  = $date->Diff($today, $two);
					$c3  = $date->Diff($today, $three);
					$c4  = $date->Diff($today, $string2);
					
					
					if($c1 > 0)
					{
						$first = "Preliminary Phase: Ongoing";
					}
					else
					{
						$first = "Preliminary Phase: Compleated";
					}
					
					if($c2 > 0)
					{
						$second = "Intermediate Phase: Ongoing";
					}
					else
					{
						$second = "Intermediate Phase: Compleated";
					}
					
					if($c3 > 0)
					{
						$third = "Advanced Phase: Ongoing";
					}
					else
					{
						$third = "Advanced Phase: Compleated";
					}
					
					if($c4 > 0)
					{
						$fourth = "Compleation Phase: Ongoing";
					}
					else
					{
						$fourth = "Compleation Phase: Compleated";
					}
				
					return $first . '<br>' . $second . '<br>' . $third . '<br>'. $fourth;	
				}
				
				
			}
			//echo "not broken";
			
			$date = new Date();
			
			//echo $date->Day("2018-30-01") . '<br>';
			//echo $date->Month("2018-50-01") . '<br>';
			//echo $date->Year("2018-30-01") . '<br>';
			
			//echo $date->Progress("2017-05-01", "2018-11-04");
			 

		?>
	</body>
</html>

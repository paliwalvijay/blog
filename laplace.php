<?php
	$a = $_POST["dtwo"];
	$b = $_POST["done"];
	$c = $_POST["dzero"];
	$x = $_POST["ntwo"];
	$y = $_POST["none"];
	$z = $_POST["nzero"];
	$stable=0;
	$count=0;
	$valid=1;
	$deg_num = -1;
	$deg_denom =-1;
	if($x!=0) $deg_num=2;
	else if($y!=0) $deg_num=1;
	else if($z!=0) $deg_num=0;
	if($a!=0) $deg_denom=2;
	else if($b!=0) $deg_denom=1;
	else if($c!=0) $deg_denom=0;
	//echo $deg_denom; 
	if($deg_num==-1||($deg_num>$deg_denom)) $count=0;

	else if($deg_num==0){
		if($deg_denom==0){
			$count=0;
				echo " System is Always Stable and Causal";
		}
		else if($deg_denom==1){
			$count=1;
			$first=(-1.0)*$c/$b;
		}
		else{
		if((($b*$b)<=(4.0*$a*$c))&&$a!=0){
			$first = (-1.0)*$b/(2.0*$a);
			$count=1;
		}
		else { 
			if($a != 0){
				$first = (-1.0)*$b/(2.0*$a) -(sqrt($b*$b - 4.0*$a*$c))/(2.0*$a);
				$second = (-1.0)*$b/(2.0*$a) +(sqrt($b*$b - 4.0*$a*$c))/(2.0*$a);
				$count  =2;
			}
			else if($b!=0){
				$first = (-1.0)*$c/$b;
				$count = 1;
			}
		}
		}
		if($first<0&&$second<0){
			$stable = 1;
		}
	}
	else if($deg_num==1){
		$nroot = $z*(-1.0)/$y;
		if($deg_denom==1){
			$first = (-1.0)*$c/$b;
			if($first==$nroot){
				$count=0;
				echo " System is Always Stable and Causal";
			}
			else{
				$count=1;
			}
		}
		else if($deg_denom==2){
			if(($b*$b)<(4.0*$a*$c)){
				$first = (-1.0)*$b/(2.0*$a);
				$count=1;
			}
			else{
						$first = (-1.0)*$b/(2.0*$a) -(sqrt($b*$b - 4.0*$a*$c))/(2.0*$a);
						$second = (-1.0)*$b/(2.0*$a) +(sqrt($b*$b - 4.0*$a*$c))/(2.0*$a);
						if($first==$nroot){$count=1;$first=$second;}
						else if($second==$nroot){$count=1;}
						else if($first==$second) $count=1;
						else $count=2;
			}
		}
	}
	else if($deg_num==2){
		$imn=0;$imd=0;
		if((($y*$y)<(4.0*$x*$z))){
			$nfirst = (-1.0)*$y/(2.0*$x);
			$nsecond = sqrt(4.0*$x*$z-$y*$y)/(2.0*$x);
			$imn=1;
		}
		else { 
				$nfirst = (-1.0)*$y/(2.0*$x) -(sqrt($y*$y - 4.0*$x*$z))/(2.0*$x);
				$nsecond = (-1.0)*$y/(2.0*$x) +(sqrt($y*$y - 4.0*$x*$z))/(2.0*$x);
			}
		if(($b*$b)<(4.0*$a*$c)){
			$first = (-1.0)*$b/(2.0*$a);
			$second = sqrt(4.0*$a*$c-$b*$b)/(2.0*$a);
			$imd=1;
		}
		else { 
				$first = (-1.0)*$b/(2.0*$a) -(sqrt($b*$b - 4.0*$a*$c))/(2.0*$a);
				$second = (-1.0)*$b/(2.0*$a) +(sqrt($b*$b - 4.0*$a*$c))/(2.0*$a);
			}
		if($imd!=$imn){
			if($imd==1){
				$count=1;
			}
			else{
				if($first==$second)
					$count=1;
				else
					$count=2;
			}
		}
		else if($imd==1){
			if(($nfirst==$first)&&($nsecond==$second)){
				$count=0;
				echo " System is always causal and BIBO stable.";
			}
			else{
				$count=1;
			}
		}
		else{
			if($first==$nfirst){
				if($second==$nsecond){
					$count=0;
					echo " System is always causal and BIBO stable.";
				}
				else{
					$first = $second;
					 $count=1;
					}
			}
			else if($first==$nsecond){
				if($second==$nfirst){
					$count=0;
					echo " System is always causal and BIBO stable.";
				}
				else{
					$count=1;
					$first = $second;
				}
			}
			else if($second==$nsecond){
				$count=1;
			}
			else if($second==$nfirst){
				$count=1;
			}
			else{
				if($first==$second) $count=1;
				else
					$count=2;
			}
		}
	}
?>
<html>
<head>
	<title>SolveLaplace</title>
	<style>
		p{font-size:30;}
	</style>
</head>
<body style="background:#FFA500">
	<p><b> Possible ROC's and properties are : </b></p>
	<p><?php if($count>=1) {echo "1. Re{s}< "; echo $first;  if($first<=0){echo "  -  Unstable, Non-Causal "; } else echo " -  Stable, Non-Causal ";  }?></p>
	<p><?php if($count==1) {echo "2. Re{s}> "; echo $first; if($first>=0){echo " -  Unstable, Causal "; } else echo " -  Stable, Causal ";}?></p>
	<p><?php if($count==2){echo "2. "; echo $first; echo "< Re{s} < "; echo $second; if($first<0&&$second>0) echo " -  Stable, Non-Causal"; else echo"-  Unstable, Non-Causal"; }?><br></p>
	<p><?php if($count==2){ echo "3. Re{s}> "; echo $second; if($second<0) echo " -  Stable, Causal"; else echo " -  Unstable, Causal"; }?></p>
	<p><?php if($count==0){ echo "None";}?></p>
	<a style="font-size:30px; margin-left:300px;" href="index.php">Back</a>
	<footer style="display: block;">
  <p style="font-size:20px;">Developed by: Vijay Kumar Paliwal</p>
  <p style="font-size:20px;">Contact information: <a href="mailto:paliwal.2@iitj.ac.in">
  paliwal.2@iitj.ac.in</a>.</p>
</footer> 
</body>
</html>

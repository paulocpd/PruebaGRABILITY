<?php


$_fp = fopen("input.txt", "r");
$arrayInput=array();
if ($_fp) {
	$i=0;
    while (($line = fgets($_fp)) !== false) {
        // process the line read.
  	
  		$arrayInput[$i]=$line;
  		$i=$i+1;
    }

    fclose($_fp);
} else {
    // error opening the file.
} 
$arrayTem=array();
echo $totalTest=$arrayInput[0];
for($tem=1;$tem<count($arrayInput);$tem++){
		$arrayTem[$tem]=$arrayInput[$tem];

	}
	$arrayInput=$arrayTem;
	
	$cut=1;
	$arraylongTest=array();
	for($numTest=0;$numTest<$totalTest;$numTest++){
		 $line2=explode(" ",$arrayInput[$cut]);
		 $line2[1];
		 $cut=$line2[1]+2;
		 $arraylongTest[$numTest]=$line2[1];	
	}
	$arrTipeQuery=array();
	$index=2;
	for ($r=0;$r<count($arraylongTest);$r++) {
		
		for ($x=0;$x<$arraylongTest[$r];$x++){
			//echo $x.$arraylongTest[$r];
			$arrTipeQuery[$r][$x]=explode(" ", $arrayInput[$x+$index]);
		}
		$index=$index+$arraylongTest[$r]+1;
}
	$arrOut=array();
	/*echo "<pre>";
	print_r($arrTipeQuery);
	echo "<pre>";
	*/
	foreach ($arrTipeQuery as $k => $untipe) {
		for($ref=0;$ref<=100;$ref++){
			$arrayMatrix[$ref]=0;
		}
		
		for($i=0;$i<count($untipe);$i++){
			if($untipe[$i][0]=="UPDATE"){
			 $arrayMatrix[$untipe[$i][1]]=$untipe[$i][4];
			}
			else{
				 $base = $untipe[$i][4]-$untipe[$i][3];
				if($base==0){

					if($arrayMatrix[$base]==$arrayMatrix[$untipe[$i][3]]){
						$resul =$arrayMatrix[$base]+$arrayMatrix[$untipe[$i][4]];
					}
					else{
						$resul =$arrayMatrix[$base]+$arrayMatrix[$untipe[$i][4]];

					}
							
				}
				else{
					if($arrayMatrix[$base]==$arrayMatrix[$untipe[$i][3]]){
						$resul = $arrayMatrix[$base]+$arrayMatrix[$untipe[$i][4]];
					}
					else{

						  $resul = $arrayMatrix[$base]+$arrayMatrix[$untipe[$i][3]]+$arrayMatrix[$untipe[$i][4]];
					}
					
				}
			echo $resul."\n";
			}

		}

	}

?>
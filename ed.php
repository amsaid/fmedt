<?php
$filename = "Morocco.edt";
$handle = fopen($filename, "r+") or die("Could not open $filename" . PHP_EOL);

$keep = array();
$no = ["GOALKEEPER","MIDFIELDER_RIGHT_SIDE","ATTACKING_MIDFIELDER_RIGHT_SIDE",'MIDFIELDER_LEFT_SIDE','ATTACKING_MIDFIELDER_LEFT_SIDE'];
$ok = ["DEFENDER_CENTRAL","MIDFIELDER_CENTRAL", 'ATTACKING_MIDFIELDER_CENTRAL','ATTACKING_MIDFIELDER_LEFT_SIDE','ATTACKING_MIDFIELDER_RIGHT_SIDE'];
$i = 0;
while(!feof($handle)) {
    $line = fgets($handle);
    //if(!preg_match("(2002)", $line)) {

    	/*if(preg_match("(GOALKEEPER|ATTACKING_MIDFIELDER_LEFT_SIDE|ATTACKING_MIDFIELDER_RIGHT_SIDE|MIDFIELDER_RIGHT_SIDE|MIDFIELDER_LEFT_SIDE)", $line)){
    		if(rand(1,10) > 5){
    			$line = str_replace(
    				$no
    				, [
    					$ok[rand(0,4)],
    					$ok[rand(0,4)],
    					$ok[rand(0,4)],
    					$ok[rand(0,4)],
    					$ok[rand(0,4)],
    				]
    				, $line);
    			//echo $line;
    		}
    	}
    	

    	$d = explode('" "',$line);
    	//die();
    	/*if($line && count($d) > 16){

	    	$d[16] += 10;
	    	$line = implode('" "',$d);
    	}*/
        echo $i."\n";
        
        if(($i%2)===0){
            $keep[] = $line;
        }
        echo count($keep)."\n";
        $i++;

   // }
}
//var_dump($keep[500]);
rewind($handle);
ftruncate($handle, 0);
fwrite($handle, implode('', $keep));
fclose($handle);
die('done'."\n");
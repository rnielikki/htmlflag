<?php
	$arr=array();
	$cont="";
	if ($handle = opendir('maa')) {
	    /* This is the correct way to loop over the directory. */
    	while (false !== ($entry = readdir($handle))) {
		if($entry!='.' && $entry!='..' && preg_match("/\.css$/",$entry)!=1 && $entry!="css"){
			echo $entry." - kirjoitettu\n";
			array_push($arr,$entry);
		}
	    }
	    asort($arr);
	    foreach($arr as $content){
		$cont=$cont.$content."\n";
	    }
	    file_put_contents('maalist.txt',$cont."\n");
	    closedir($handle);
	}

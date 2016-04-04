
	$arr=array();
	$cont="";
	if ($handle = opendir('maa')) {
    	while (false !== ($entry = readdir($handle))) {
		if($entry!='.' && $entry!='..' && preg_match("/\.css$/",$entry)!=1 && $entry!="css"){
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

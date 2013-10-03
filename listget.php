<?php
	$str=$_POST['str'];
	$arr=array();
	if(preg_match('/[a-zA-Z\\s]+/',$str)!==1){
		return 0;
	}
	$contents=file_get_contents('maalist.txt');
	$contents=explode("\n",$contents);
	foreach($contents as $con){
		if(preg_match('/^'.$str.'/i',$con)===1){
			array_push($arr,$con);
		}
	}
	echo json_encode($arr);

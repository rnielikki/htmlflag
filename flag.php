<?php
$maa=$_GET['maa'];
$pxval=$_GET['pxval'];
if(strstr($maa,"..")){
	die("Bad Directory");
}
if($pxval<100 || $pxval>800){
	$pxval='800';
	$px=1;
}
else{
	$px=800/$pxval;
}
$lahdekoodi=file_get_contents('maa/'.$maa) or die('No such file');
$lahdekoodi=preg_replace_callback('/(\d+|[0-9]+\.[0-9]+)px/',create_function('$matches','global $px; $matches[0]=substr($matches[0],0,-2); return floatval($matches[0]/$px)."px";'),$lahdekoodi);
?>
<!DOCTYPE HTML>
<head>
<meta charset="utf-8">
<title>CSS Flag - <?=$maa?></title>
<style type="text/css">
body{background-color:#eee;}
a:link{color:#569;text-decoration:none;}
a:hover{color:#569;background-color:#eee;text-decoration:underline;font-weight:bold;}
a:visited{color:#569;text-decoration:none;}
a:active{color:#cce;background-color:#eee;text-decoration:underline;font-weight:bold;}
<?php
if(file_exists('maa/css/'.$maa)){
$css=file_get_contents('maa/css/'.$maa);
$css=preg_replace_callback('/(\d+|[0-9]+\.[0-9]+)px/',create_function('$matches','global $px; $matches[0]=substr($matches[0],0,-2); return floatval($matches[0]/$px)."px";'),$css);
echo $css;
}
?>
</style>
</head>
<body>
<form method="get" action="<?=$_SERVER['PHP_SELF']?>">
<label>Write size in pixel (100-800): </label>
<input type="hidden" value="<?=$maa?>" name="maa">
<input type="text" name="pxval">
<input type="submit" value="ok">
</form>
<h3><?=$maa." ( width ".$pxval."px )"?></h3>
<?=$lahdekoodi?>
<br>Source<br>
<textarea style="width:80%;height:300px;">
<?php
echo $css?'<style type="text/css">'."\n".$css."</style>"."\n".$lahdekoodi:$lahdekoodi;
?>
</textarea>
	<br><a onclick="history.go(-1)">Go to previous page</a>
</body>

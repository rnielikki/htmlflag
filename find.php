<!DOCTYPE HTML>
<head>
<title>HTML National Flags Project!</title>
<link rel="stylesheet" type="text/css" href="/home.css" />
<meta charset="utf-8">
<style type="text/css">
body{background:#ffffff url('measureflag.png') no-repeat right bottom; background-attachment:fixed;}
</style>
<script src="../jquery.js"></script>
</head>
<body>
<h1>Welcome to HTML National Flags Project</h1>
<h2>Search Your Country</h2>
<input type="text" id="search">
<script>
$("#search").keyup(function(){
	setTimeout(function(){
		var query=$("#search").val();
		$.post('listget.php',{ "str":query },function(data){
			$("#box").text("");
			for(i in data){
				$("#box").append("<a href=\"flag.php?maa="+data[i]+"\">"+data[i]+"</a><br>");
			}
		},"json");
	},1000);
});
</script>
<div style="width:15em;border:1px solid #ccc;">
<p id="box"></p>
</div>
<br><br><br>
<span style="font-weight:bold;">Not Here? Contrbute it!</span>
<!--
<h4>Waiting Commit</h4>
<ul>
</ul>
-->
<br>
</body>

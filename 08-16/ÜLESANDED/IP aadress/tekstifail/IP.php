<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>IP tekstifaili</title>
    <link rel="stylesheet" href="IP.css">
	</head>
	<body>

		<h1>Siin kuvame kasutajate IP aadresse!</h1>
<?php

	function getRealIpAddr() {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
			$ip=$_SERVER['REMOTE_ADDR'];
	}
	//return $ip;
	echo "$ip";
	}

	$ip=$_SERVER['REMOTE_ADDR'];

	if ($ip) {
		# code...
	}
	echo "IP address= $ip";

?>

	</body>
</html>

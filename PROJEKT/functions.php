<?php

function connect_database(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function login(){

	if (isset($_POST['loggedinuser'])) {
		include_once('booking.html');
	}

	include_once('login.html');

	if (isset($_SERVER['REQUEST_METHOD'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array();
			if (empty($_POST['user'])) {
				$errors[] = "Please enter both username and password.";
			}
			if (empty($_POST['pass'])) {
				$errors[] = "Please enter both username and password.";
			}

			if (empty($errors)){
				global $connection;
				$sisestatudusername = mysqli_real_escape_string($connection, $_POST["user"]);
				$sisestatudpassword = mysqli_real_escape_string($connection, $_POST["pass"]);
				$sql = "SELECT username, password FROM KerstiM_LennumaaKasutajad WHERE username='$sisestatudusername' AND password=SHA1('$sisestatudpassword')";
				$result = mysqli_query($connection, $sql) or die ("User by this name does not exist.");
				$rida = mysqli_num_rows($result);
				if ($rida > 0) { //user was found in db
					$_SESSION['loggedinuser'] = $sisestatudusername;
					header("Location: ?page=projects");
				} 
			}
		}
	}
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?page=homepage");
}

function registration(){
	if (isset($_POST['loggedinuser'])) {
		include_once('projects.html');
	} else {
		include_once('registration.html');
	}

	if (isset($_SERVER['REQUEST_METHOD'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array();
			if (empty($_POST['username_reg'])) {
				$errors[] = "Please enter username.";
			}
			if ($_POST['password_reg1'] != $_POST['password_reg2']) {
				$errors[] = "Passwords do not match, please enter again.";
			}
			if (empty($_POST['password_reg1'])) {
				$errors[] = "Please enter password.";
			}
			if (empty($_POST['password_reg2'])) {
				$errors[] = "Please repeat password.";
			}

			if (empty($errors)){
				//viska sisestatud andmed andmebaasi ja pane andmebaasist sisestatud kasutaja sessiooni, suuna projektide lehele, muidu kuva registration.html

				echo "You have been registered!";

				global $connection;
				$registeredusername = mysqli_real_escape_string($connection, $_POST["username_reg"]);
				$registeredpassword = mysqli_real_escape_string($connection, $_POST["password_reg1"]);
				$sql = "INSERT INTO KerstiM_LennumaaKasutajad (username, password) VALUES ('$registeredusername', SHA1('$registeredpassword'))";
				$result = mysqli_query($connection, $sql) or die ("Proovi uuesti.");

				if ($result) {
					if (mysqli_insert_id($connection) > 0) {
						$_SESSION['loggedinuser'] = $registeredusername;
						header("Location: ?page=projects");
						exit(0);
					}
				}
			}

			
			echo $registeredusername;
			echo $registeredpassword;
		}
	}
}


function kuva_main() {
	include_once('main.html');
}

function kuva_events() {
	include_once('events.html');
}

function kuva_gallery() {
	include_once('gallery.html');
}

function kuva_contact() {
	include_once('contact.html');
}

function kuva_booking() {
	include_once('booking.html');
}


?>
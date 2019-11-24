<?php
	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		session_unset();
		session_destroy();
		header('Location: ?action=inicio');
	} else {
		header('Location: ?action=inicio');
		exit;
	}
	$now = time();
	if($now > $_SESSION['expire']) {
		session_destroy();
		echo "Su sesion a terminado";
        header('Location: ?action=inicio');
		exit;
	}
?>

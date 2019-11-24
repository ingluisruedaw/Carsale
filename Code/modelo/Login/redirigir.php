<?php 
	session_start();
	if ($_SESSION['rol'] == 1) {
        header('Location: ?action=webmaster');
    }elseif ($_SESSION['rol'] == 2) {
        header('Location: ?action=administrador');
    }elseif ($_SESSION['rol'] == 3) {
        header('Location: ?action=secretaria');
    }elseif ($_SESSION['rol'] == 4) {
        header('Location: ?action=vendedor');
    }
?>
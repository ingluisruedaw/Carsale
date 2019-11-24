<?php
session_start();
require_once ('conexion.php');
$conexion = new conexion();
$username = $_POST['username'];
$password = $_POST['password']; 
$result = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ? ");
$result->execute(array($username));
$r = $result->fetch(PDO::FETCH_OBJ);

if (empty($r)) {
    die ("<script type=\"text/javascript\">alert('Usuario O Clave Errados'); window.location='?action=login';</script>");
}elseif($r->estado==1){
    if (password_verify($password, $r->clave)) { 
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['start'] = time();
        $_SESSION['rol']=$r->rol;
        $_SESSION['people']=$r->persona;
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60)*90;
        $_SESSION['idfactura']=null;
        require('modelo/Login/redirigir.php');        
    } else { 
        die ("<script type=\"text/javascript\">alert('Usuario O Clave Errados'); window.location='?action=login';</script>");
    }
}else{
    die ("<script type=\"text/javascript\">alert('Error. Su Usuario Se Encuentra Inactivo.'); window.location='?action=login';</script>");
}
 mysqli_close($conexion); 
 ?>
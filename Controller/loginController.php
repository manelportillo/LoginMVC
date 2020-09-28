<?php
include '../Model/user.php';
include '../Model/conexion.php';
$femail=$_POST ['femail'];
$fpassword=$_POST ['fpassword'];
//echo "El email es: {$femail} y la contraseña es: {$fpassword}";
//Creo objeto User (la primera mayuscula porque es una clase) 
$user=new User($femail, $fpassword);
echo $user->getEmail();
echo "<br>";
echo $user->getPassword();
$sql="SELECT * FROM tbl_user WHERE email=? AND password=?";
$smt=$pdo->prepare($sql);
$smt->bindParam(1,$femail);
$smt->bindParam(2,$fpassword);
$smt->execute();
$numUser=$smt->rowCount();
echo $numUser;
if($numUser==1) {
    header("location:../View/home.php");
}else{
    header("location:../View/vista_login.html?error=1");
}
?>
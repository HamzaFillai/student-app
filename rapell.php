<?php
$bdd = new PDO('mysql:host=localhost;dbname=prof;charset=utf8', 'root', '');
if(isset($_POST["ajout"]) && isset($_POST["area"]))
{
	$ins=$bdd->prepare("INSERT INTO `rapel`(`rappelle`) VALUES (?)");
	$ins->execute(array($_POST["area"]));
	header("Location: eleve.php");
	echo 1;
}
?>
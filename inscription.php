<?php
$bdd = new PDO('mysql:host=localhost;dbname=prof;charset=utf8', 'root', '');
if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail1"]) && isset($_POST["pass1"]))
{
    if($_POST["mail1"]==$_POST["mail2"])
    {
        $rep=$bdd->prepare("SELECT * FROM login WHERE email=?");
        $rep->execute(array($_POST["mail1"]));
        $count=$rep->rowCount();
        if($count==0)
        {
            $creer=$bdd->prepare("INSERT INTO `login`( `prenom`, `nom`, `email`, `password`) VALUES (?,?,?,?)");
            $creer->execute(array($_POST["prenom"],$_POST["nom"],$_POST["mail1"],$_POST["pass1"]));
            echo 1;
        }
        else
        {
            echo 2;
        }
    }
    else
    {
        echo 3;
    }
}
?>
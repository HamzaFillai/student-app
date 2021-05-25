<?php
$bdd = new PDO('mysql:host=localhost;dbname=prof;charset=utf8', 'root', '');
if(isset($_POST["mail"]) && isset($_POST["pass"]))
{
	$don = $bdd->prepare("SELECT * FROM login WHERE email=?");
	$don->execute(array($_POST["mail"]));
	$rep=$don->fetch();
	$count = $don->rowCount();
	if($count==1)
	{
		if($rep["password"]==$_POST["pass"])
		{
			header("Location: board.php?id=".$rep["id"]);
			
		}
		else
		{
			$err="Votre adresse mail ou votre mot de passe est incorrect.";
		}
	}
	else
	{
		$err="Votre adresse ou votre mot de passe est incorrect.";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="log.css">

</head>
<body>
	<div  class="alll">
		<div class="container">
			<p> <img src="teacher.png"></p>
			<h2>Connexion</h2>
		</div>
		
				<?php
				 if(isset($err))
				 {?>
				 	<span style="background: rgb(255,204,204);font-size: 17px;padding: 12px;font-family:  Verdana;" >Votre adresse mail ou votre mot de passe est incorrect.</span>
				 <?php
				 }
				?>
		
		<form id="myform" method="post" action="index.php">
			<p>
				<i class="fas fa-envelope"></i>
				<input class="inp" type="email" name="mail" placeholder="Adresse mail" required="">
			</p>
			<p>
				<i class="fas fa-lock"></i>
				<input class="inp" type="password" name="pass" placeholder="Mot de passe" required="">
			</p>
			<p>
				<input class="btn" type="submit" name="" value="Se connecter">
			</p>
		</form>
		<p style="font-size: 17px;">Si vous n'avez oas de comptes, <span id="ins">Cliquer ici!</span>
	<div class="modal-bg">
		<form class="modal" method="post" action="inscription.php">
			<h1>Isncritpion</h1>
			<span id="ver"></span>
			<p>
				<input class="inp1" type="text" name="nom" id="nom" required="" placeholder="Nom">
			</p>
			<p>
				<input class="inp1" type="text" name="prenom" id="prenom" required="" placeholder="Prénom">
			</p>
			<p>
				<input class="inp1" type="email" name="mail1" id="mail1" placeholder="Adresse mail" required="">
			</p>
			<p>
				<input class="inp1" type="email" name="mail2" id="mail2" placeholder="Confirmer votre adresse mail" required="">
			</p>
			<p>
				<input class="inp1" type="password" name="pass1" id="pass1" required="" placeholder="Mot de passe">
			</p>
			<p>
				<input id="btn11" class="btn1" type="submit" name="" value="S'inscrire">
			</p>
			<span style="background: red; color: white; width: 20px;" id="close" class="modal-close">X</span>
		</form>
	</div>
</body>
<script type="text/javascript" >
	var ins = document.getElementById("ins");
	var close = document.getElementById("close");
	var modalbg = document.querySelector(".modal-bg");
	
	ins.addEventListener("click",function(){
			modalbg.classList.add("bg-active");

		});
	close.addEventListener("click",function(){
			modalbg.classList.remove("bg-active");
		});
	var from = document.querySelector(".modal");
	var ver = document.getElementById("ver");
	$(document).ready(function(){
		from.addEventListener("submit",function(e){
			e.preventDefault();
			$.ajax({
				type: 'POST',
           		url: 'inscription.php',
           		data: {
           			nom:$("#nom").val(),
           			prenom:$("#prenom").val(),
           			mail1:$("#mail1").val(),
           			mail2:$("#mail2").val(),
           			pass1:$("#pass1").val()
           		},
           		success: function(status){
                if (status == 1) {
                    $('#ver').html('<div style="color : green; font-weight : bold; font-size : 16px;">Votre inscription est faite  avec succés</div>');
                    setTimeout('window.location.href = "index.php";',3000);
                }
                else if(status == 3) {
                	alert(status);
                    $('#ver').html('<div style="color : red; font-weight : bold; font-size : 16px;">Vérifiez vos adresses mails !</div>');
                	}
                else{

                	$('#ver').html('<div style="color : red; font-weight : bold; font-size : 16px;">Cette adresse mail existe déjà ! </div>');
                }
            	}
			});
		});
	});
	
</script>
</html>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=prof;charset=utf8', 'root', '');
$res=$bdd->query("SELECT * FROM eleve");
$i = 0;
while($res->fetch())
{	
	$i=$i+1;
}
$count=$i;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tableau de bors</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<style type="text/css">
	@import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";
*
{
	margin: 0;
	padding: 0;
	text-decoration: none;
	list-style: none;
	box-sizing: border-box;
}

body
{
	font-family: montserrat;
	background: #faf0f5;
}

nav
{
	background: #128479;
	height: 80px; 
	width: 100%;
}

.logo
{
	color: white;
	font-size: 35px;
	line-height: 80px;
	padding: 0 100px; 
	font-weight: bold;
}

nav ul
{
	float: right;
	margin-right: 20px;
}

nav ul li 
{
	display: inline-block;
	line-height: 80px;
	margin: 0 10px;
}

nav ul li a
{
	color: white;
	font-size: 17px;
	padding: 7px 13px;
	text-transform: uppercase;
	border-radius: 3px;
}

a.active, a:hover
{
	background: #009688;
	transition: .5s;
}

.checkbtn
{
	font-size: 30px;
	color : white;
	float: right;
	line-height: 80px;
	margin-right: 40px;
	cursor: pointer;
	display: none;
}

#check
{
	display: none;
}
section
{
	display: flex;
	justify-content: center;
	align-items: center;
	background-image: url("enseignant.jpg");
	background-size: cover;
	background-attachment: fixed;
	height: 500px;
}

.cit 
{
	
	text-align: center;
	color: #993366;
	padding : 12px;
	font-weight: bold;
	font-size: 30px;
}

.cit button
{
	font-size: 25px;
	padding: 12px;
	border : none;
	border-radius: 8px;
	cursor: pointer;
	outline: none;
	transition: background 0.4s,color 0.4s linear;
	font-weight: bold;
}

.cit button:hover
 {
 	background: #c0809f;
 	color: white;
 }

 .b1
 {
 	margin-right: 50px;
 	margin-top: 100px;
 	text-align: center;
	background: #c6538c;
	padding: 12px;
	font-size: bold;
	padding: 30px;
	font-size: 30px;
	border-radius: 20px;
	font-family: 'Brush Script MT', cursive;
	cursor: pointer;
	outline: none;
	transition: 0.5s;
	transition-property: transform;
 }

 .b
 {
 	display: flex;
 	margin-left: 250px;
 }

 .b1 a
 {
 	text-decoration: none;
 	color: black;
 	background: transparent;
 }

 .b1:hover
 {
 	transform : scale(1.06);
 }

 #curve_chart
 {
 	margin-left: 220px;
 }

 #marks
 {
 	background: none;
 	margin-left: 50%;
 	border-radius: 6px ;
 	font-size: 18px;
 	font-weight: bold;
 	padding: 2px;
 	cursor: pointer;
 	outline: none;
 	width: 110px;
 	transition: width 1s;
 }

 #marks:hover
 {
 	width: 130px;
 }

 #sec
 {
 	display: flex;
 	margin-right: 25px;
 	justify-content: space-around;
 }

 footer
 {
 	margin-top: 50px;
 	background: rgb(0,132,132);
 	display: flex;
 	padding: 12px;
 }

 .foo1
 {
 	margin-left: 230px;
 	font-weight: bold;
 	font-size: 25px;
 	color: white;
 }

 .foo2 
 {
 	margin-left: 400px;
 	font-weight: bold;
 	font-size: 25px;
 	justify-content: space-around;
 }

 .foo2 a
 {
 	background: none;
 	color: white;
 }

 .foo2 h2
 {
 	margin-left: 20px;
 	color: white;
 }

 @media screen and (max-width: 1400px)
 {
 	.b
 	{
 		margin-left: 150px;
 	}
 }

 @media screen and (max-width: 1400px)
 {
 	.b
 	{
 		margin-left: 80px;: 
 	}
 }

@media screen and (max-width: 1267px)
{
	.logo
	{
		font-size: 30px;
		padding-left: 50px;
	}
	nav ul li a
	{
		font-size: 16px;
	}
}

@media screen and (max-width: 1267px)
{
	.checkbtn
	{
		display: block;
	}

	ul
	{
		position: fixed;
		width: 50%;
		height: 60%;
		background: #2c3e50;
		top: 80px;
		right: -100%;
		text-align: center;
		transition: all .5s;
	}

	nav ul li 
	{
		display: block;
		margin: 50px 0px;
		line-height: 30px;
	}

	nav ul li a
	{
		font-size: 20px;
	}

	nav ul li a:hover, nav ul li a.active
	{
		background: none;
		color: #0082e6;
	}

	#check:checked~ul
	{
		right:-19px;
	}
	footer 
	{
		display: block;
	}

	.foo1
	{
		margin-left: 30px;
	}

	.foo2
	{
		margin-top: -80px;
	}
}

@media screen and (max-width: 800px)
 {
 	.b
 	{
 		display: block;
 	}
 	#image
 	{
 		display: none;
 	}
 	#sec 
 	{
 		
 		margin-left: -190px;
 	}
 	.foo2
 	{
 		margin-top: 10px;
 		margin-left: 300px;
 	}

 }
}
</style>
<body>
	<header>
		<nav>
			<input type="checkbox" id="check">
			<label for="check" class="checkbtn">
				<i class="fas fa-bars"></i>
			</label>
			<label class="logo">Salut Hamza Filai</label>
			<ul class="menu">
				<li><a class="active" href="board.php">Tableau de bord</a></li>
				<li><a href="eleve.php">Etudiants</a></li>
				<li><a href="emploi.php">Emplois du Temps</a></li>
				<li><a href="index.php">Se déconnecter</a></li>
			</ul>
		</nav>
	</header>
	<section>
		<div class="cit">
			<h2 id="quote">“En apprenant, tu enseigneras. En enseignant, tu apprendras.”</h2>
			<br/>
			<button id="btn">Autres Proverbes</button>
		</div>
	</section>

	<div id="h111">
		<h1 style="margin-left: 250px;margin-top: 50px;">Qui suis-je?</h1>
	</div>
	<div id="sec">
		<p style="font-size: 20px;margin-left: 200px; margin-top: 30px;font-family: Arial,Helvetica,sans-serif;width: 700px;border : 1px solid black; padding: 5px;border-radius: 5px;box-shadow: 2px 2px #393e46;">
			Salut, Je suis X. Titulaire d’une maitrise de lettres appliqués et d’un DEUG de mathématiques. Actif depuis plusieurs années en tant que professeur à l’école Tayeb El Alaoui, j’ai pu gérer la formation et l’apprentissage de nombreux collégiens et dispenser le programme scolaire établi par notre rectorat son intégralité. La pédagogie, l’écoute et la patience font partie de mes principales qualités. Enseigner et transmettre un savoir a toujours été une vocation pour moi, ainsi devenir professeur des écoles titulaires s’inscrit aussi bien dans ma logique de carrière que dans ma vie personnelle.
		</p>
		<p id="image" style="margin-right: 30px;margin-top: 25px;">
			<img src="prof.png">
		</p>
	</div>

	<div class="b">
		<div class="b1">
			<p style="margin-top: 25px;"><a href="eleve.php">Nombre d'Eleves :<br/> <?php echo $count ?></a></p>
		</div>
		<div class="b1">
			<p><a href="">Les nombres d'heures<br/> que je travaille : </a></p>
		</div>
		<div class="b1">
			<p><a href="https://www.dreamjob.ma/wp-content/uploads/2020/07/Calendrier-des-Vacances-Scolaires-au-Maroc-2020-2021.jpg" target="_blank">Les vacances<br/><span style="font-size:50px">&#128525;</span></a></p>
		</div>
	</div>

	<footer>
		<div class="foo1">
			<h2>Contact me</h2>
			<p>+212632757088</p>
		</div>
		<div class="foo2">
			<h2>OR :</h2>
			<a href=""><i class="fab fa-facebook-f"></i></a><span style="opacity: 0">hhh</span>
			<a href=""><i class="fab fa-instagram"></i></a><span style="opacity: 0">hhh</span>
			<a href=""><i class="far fa-envelope"></i></a>
		</div>
	</footer>
	<div style="text-align: right;background: rgb(0,106,106);color: white;">
		<p>Powered By : Hamza Filali © 2021</p>
	</div>
</body>
<script type="text/javascript">
	var btn = document.getElementById("btn");
	var quote = document.getElementById("quote");
	var quo=["“En apprenant, tu enseigneras. En enseignant, tu apprendras.”","“L’enseignant est celui qui suscite deux idées là où auparavant il n’y en avait qu’une seule.”","“On le voit, les qualités humaines doivent être nombreuses pour prétendre porter le titre d'enseignant. ”","“Pour l’enseignant il ne s’agit pas d’aimer ou de détester, il s’agit avant tout de ne pas se tromper.”","“Quand un homme, enseignant ce qu'il ne sait pas à quelqu'un qui n'a aucune aptitude pour l'apprendre, lui donne un diplôme, ce dernier a complété son éducation d'homme comme il faut.”","“Si vous enseignez à un homme, vous enseignez à une personne. Si vous enseignez à une femme, vous enseignez à toute la famille.”","“Un enseignement qui n’enseigne pas à se poser des questions est mauvais.”"];
	btn.addEventListener("click",function(){
		var random=Math.floor(Math.random()*quo.length);
		quote.innerHTML=quo[random];
	});
</script>
</html>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=prof;charset=utf8', 'root', '');
$res=$bdd->query("SELECT * FROM eleve");
if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["note"]))
{
	$ins=$bdd->prepare("INSERT INTO `eleve`(`prenom`, `nom`, `note`,`note2`,`note3`) VALUES (?,?,?,?,?)");
	$ins->execute(array($_POST["prenom"],$_POST["nom"],$_POST["note"],$_POST["note2"],$_POST["note3"]));
	header("Location: eleve.php");
}

if(isset($_GET["delete"]))
{
	$del=$bdd->prepare("DELETE FROM `eleve` WHERE id=?");
	$del->execute(array($_GET["delete"]));
	header("Location: eleve.php");
}


if(isset($_GET["edit"]))
{
	$ed=$bdd->prepare("SELECT * FROM `eleve` WHERE id = ?");
	$ed->execute(array($_GET["edit"]));
	$r=$ed->fetch();
	$n=$r["nom"];
	$p=$r["prenom"];
	$no=$r["note"];
	$no2=$r["note2"];
	$no3=$r["note3"];
	{
		$de=$bdd->prepare("DELETE FROM `eleve` WHERE id=?");
		$de->execute(array($_GET["edit"]));
	}
}

if(isset($_GET["delr"]))
{
	$del=$bdd->prepare("DELETE FROM `rapel` WHERE id=?");
	$del->execute(array($_GET["delr"]));
	header("Location: eleve.php");
}

$rap=$bdd->query("SELECT * FROM rapel");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eleve</title>
	<link rel="stylesheet" type="text/css" href="e.css">
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
	background: rgb(221,238,238);
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

nav ul li a.active, nav ul li a:hover
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

table
{
	border-collapse: collapse;
	justify-content: center;
	align-items: center;
}

#tab td
{
	border : none;
}

#tab a:hover
{
	background: none;
	font-size: 20px;
}

#tab td
{
	font-weight: bold;
	font-size: 17px;
	width: 300px;
	text-align: left;
}

td,th
{
	border : none;
	text-align: justify;
	width: 200px;
	padding: 12px;
	text-align: center;
}

td
{
	font-size: 19px;
}

th
{
	font-size: 20px;
	border-bottom: 3px solid black;
}

.form
{
	position: fixed;
	z-index: 7;
	width: 100%;
	height: 110vh;
	top: 0;
	left: 0;
	background-color: rgb(0,0,0,0.5);
	display: flex;
	justify-content: center;
	align-items: center;
	visibility: hidden;
	opacity: 0;
	transition: visibility 0.5s, opacity 0.5s;
}

.foo
{
	visibility: visible;
	opacity: 1;
}

.fo
{
	position: relative; 
	background: rgb(187,221,221);
	padding: 15px;
	width: 300px;
	border-radius: 12px;
	align-items: center;
	z-index: 7;
}

.form label
{
	font-size: 20px;
	font-weight: bold;
}

.form-close
{
	position: absolute;
	top: 10px;
	right: 10px;
	font-weight: bold;
	cursor: pointer;
}

.inp
{
	background: transparent;
	font-size: 15px;
	padding: 3px;
	border-radius: 6px;
}

#bouton
{
	background: transparent;
	font-size: 17px;
	padding: 5px;
	cursor: pointer;
	outline: none;
	border-radius: 6px;
	width: 40%;
	transition: background 1s;
	font-weight: bold;
}

#bouton:hover
{
	background: rgb(116,186,186);
	color: white;
}

#rapel
{
	background: rgb(187,221,221);
	width: 50%;
	margin-left: 24%;
	margin-top: 80px;
	padding: 12px;
	border-radius: 12px;
	line-height: 30px;
}

#btna
{
	margin-left: 600px;
	padding: 5px;
	font-weight: bold;
	font-size: 16px;
	cursor: pointer;
	outline: none;
	border-radius: 4px;
	margin-right: 100px;
	background: rgb(36,132,132);
	color: white;
}

#rapel h3
{
	color: red;
	font-size: 25px;
}

#rapel p
{
	font-size: 17px;
	font-weight: bold;
	margin-top: 15px;
}

.dis
{
	display: flex;
	margin-right: 100px;
	margin-left: 200px;
}

#del
{
	color: red;
	cursor: pointer;
	outline: none;
}

#student
{
	display: flex;
}

#btnr
{
	position: absolute;
	margin-left: 38%;
	font-size: 16px;
	padding: 5px;
	font-weight: bold;
	border-radius: 5px;
	background: transparent;
	cursor: pointer;
	outline: none;
}

#btnr:hover
{
	background: rgb(116,186,186);
	color: white;
}

#supp
{
	text-decoration: none;
	padding: 4px;
	background: red;
	color: white;
}

.mod
{
	text-decoration: none;
	padding: 4px;
	background: blue;
	color : white;
}

.modal-bg
{
	position: fixed;
	width: 100%;
	height: 100vh;
	top: 0;
	left: 0;
	background-color: rgb(0,0,0,0.5);
	display: flex;
	justify-content: center;
	align-items: center;
	visibility: hidden;
	opacity: 0;
	transition: visibility 0.5s, opacity 0.5s;
}

.menu
{
	z-index: 7;
}

.bg-active
{
	visibility: visible;
	opacity: 1;
}

.modal
{
	position: relative; 
	padding: 12px;
	background:rgb(187,221,221);
	width: 25%;
	height: 40%;
	display: flex;
	justify-content: center;
	align-items: center; 
	flex-direction: column;
	text-align: center;
	border-radius: 8px;
}

.inp1
{
	border: none;
	outline: none;
	font-size: 15px;
	border: 1px solid black;
	width: 250px;
	padding: 5px;
	height: 100px;
	border-radius: 10px;
}

.btn1
{
	padding: 6px;
	font-size: 15px;
	font-weight: bold;
	border-radius: 5px;
	cursor: pointer;
	outline: none;
	background: transparent;
	transition: background 0.4s linear;
}

.btn1:hover
{
	background: rgb(116,186,186);
	color: white;
}

.modal-close
{
	position: absolute;
	top: 10px;
	right: 10px;
	font-weight: bold;
	cursor: pointer;
}

#columnchart_values
{
	margin-left: 260px;
	font-weight: bold;
	padding: 12px;
}

footer
 {
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

	#rapel
	{
		width: 70%;
		margin-left: 130px;
	}

	#p1
	{		
		margin-left: -11%;
	}

	#rapel button
	{
		margin-left: 46%;
	}

	#listee h2
	{
		font-size: 20px;
		margin-left: -5%;
	}

	#bout
	{
		margin-left: -27%;
	}

	#student
	{
		margin-right: -60%;
	}

	#listee table
	{
		margin-left: -100px;
	}

	#lien
	{
		display: flex;
		justify-content: space-around;
	}
	.modal
	{
		width: 400px;
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

@media screen and (max-width: 550px)
{

	#rapel
	{
		width: auto;
		margin-left: 0;
	}
	#rapel button
	{
		margin-left: 65%;
	}
	#p1
	{
		margin-left: -26%;
	}
	#listee h2
	{

		margin-left: -15%;
	}
	#bout
	{
		margin-left: -62%;
	}
	th,td
	{
		font-size: 15px;
	}
	#listee table
	{
		margin-left: -75px;
	}
	#columnchart_values
	{
		transform: rotate(90deg);
		margin-left: -190px;
		margin-top: 100px;
	}

	footer
	{
		margin-top: 450px;
	}

	.foo2
 	{
 		margin-top: 10px;
 		margin-left: 300px;
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
				<li><a href="board.php">Tableau de bord</a></li>
				<li><a class="active" href="eleve.php">Etudiants</a></li>
				<li><a href="emploi.php">Emplois du Temps</a></li>
				<li><a href="index.php">Se déconnecter</a></li>
			</ul>
		</nav>
	</header>
		<section class="form">
			<form class="fo" method="post" action="eleve.php">
				<p style="text-align: center;"><img src="Student.png"></p>
				<br/>
				<h2 style="text-align: center;">Ajouter un élève</h2><br/>
				<p>
					<label>Nom </label><br/>
					<input class="inp" type="texte" name="nom" required="" value=<?php if(isset($n)) echo $n;?>>
				</p>
				<br/>
				<p>
					<label>Prénom </label><br/>
					<input class="inp" type="text" name="prenom" required="" value=<?php if(isset($p)) echo $p;?>>
				</p>
				<br/>
				<p>
					<label>1ere Note </label><br/>
					<input class="inp" type="text" name="note" required="" value=<?php if(isset($no)) echo $no;?>>
				</p>
				<br/>
				<p>
					<label>2eme Note </label><br/>
					<input class="inp" type="text" name="note2" required="" value=<?php if(isset($no2)) echo $no2;?>>
				</p>
				<br/>
				<p>
					<label>3eme Note </label><br/>
					<input class="inp" type="text" name="note3" required="" value=<?php if(isset($no3)) echo $no3;?>>
				</p>
				<br/>
				<p style="margin-left: 5px;">
					<input id="bouton" type="submit" value="Enregistrer">
				</p>
				
			</form>
		</section>
			<br/>
		<section id="rapel">
			<div id="ra" style="display: flex;">
				<h3>Rappel !</h3>
				<button id="btnr">Ajouter un rappel</button>
			</div>
			<?php
			while($ra=$rap->fetch())
			{
			?>
			<table id="tab">
				<tr>
					<td style="width: 600px;"><?php echo $ra["rappelle"]; ?></td>
					<td style="text-align: right;"><a style="text-decoration: none;" href="eleve.php?delr=<?php echo $ra["id"]; ?>"><i id="del" class="fas fa-trash-alt"></i></a></td>
				</tr>
			</table>
			<?php
			}
			?>
		</section>
		<br/>
		<br/>
		<br/>
		<br/>
		<div id="p1">
			<p style="margin-left: 24%;font-weight: bold;font-size: 20px;"><i style="color: rgb(213,213,0);font-size: 25px;" class="fas fa-exclamation-triangle"></i>Si vous voulez modifier le nom, le prénom ou la note d'un élève, il suffit d'appuuyer sur le<br/> bouton modifier, puis sur le bouton ajouter, et après vous pouvez le modifier (dans tout les<br/> cas appuyez sur le bouton enregistrer)</p>
		</div>
		<br/>
		<br/>
	<section id="listee" style="margin-left: 14%;">
		<div id="student" style="margin-left: 10%;">
			<h2 style="text-decoration: underline;font-family: 'Brush Script MT', cursive; color: rgb(50,99,99); ">Liste des élèves</h2>
			<div id="bout">
				<button id="btna">Ajouter</button>
			</div>
		</div>
		<br/>
		<br/>
		<table >
			<thead>
				<th>Nom</th>
				<th>Prenom</th>
				<th>1ere Note</th>
				<th>2eme Note</th>
				<th>3eme Note</th>
				<th>Action</th>
			</thead>
			<?php
				while($don=$res->fetch())
				{?>
					<tr>
						<td><?php echo $don["nom"]; ?></td>
						<td><?php echo $don["prenom"]; ?></td>
						<td><?php echo $don["note"]; ?></td>
						<td><?php echo $don["note2"]; ?></td>
						<td><?php echo $don["note3"]; ?></td>
						<td>
							<div id="lien">
								<a id="supp" href="eleve.php?!=<?php echo $don["id"]; ?>">Supprimer</a>
								<a class="mod" href="eleve.php?edit=<?php echo $don["id"]; ?>">Modifier</a>
							</div>
						</td>
					</tr>
				<?php
				}
			?>
		</table>
	</section>
	<div class="modal-bg">
		<form class="modal" method="post" action="rapell.php">
			<h1>Ajouter un rappel</h1>
			<br/>
			<textarea name="area" id="area" class="inp1" required=""></textarea>
			<br/>
			<input name="ajout" id="btn11" class="btn1" type="submit" value="Ajouter">
			<br/>
			<span style="background: red; color: white; width: 20px;" id="close" class="modal-close">X</span>
		</form>
	</div>
	<br/>
	<br/>
	<br/>
	<div id="columnchart_values" style="width: 800px; height: 500px;"></div>

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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Nom', '1ere Note','2eme Note','3eme Note'],
          <?php
          $res=$bdd->query("SELECT * FROM eleve");
			
			while($don=$res->fetch())
			{	
				echo "['".$don["nom"]."',".$don["note"].",".$don["note2"].",".$don["note3"]."],";
			}
          ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,2,3]);

      var options = {
        title: "Les statistiques des notes des élèves",
        width: 1050,
        height: 400,
        bar: {groupWidth: "95%"},
        backgroundColor: 'rgb(116,186,186)',
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<script type="text/javascript">
	var btnr = document.getElementById("btnr");
	var btna = document.getElementById("btna");
	var close = document.getElementById("close");
	var modalbg = document.querySelector(".modal-bg");
	var form = document.querySelector(".form");
	
	btnr.addEventListener("click",function(){
			modalbg.classList.add("bg-active");
		});
	btna.addEventListener("click",function(){
			form.classList.add("foo");
		});
	close.addEventListener("click",function(){
			modalbg.classList.remove("bg-active");
		});
</script>
</html>
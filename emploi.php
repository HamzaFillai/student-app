<?php
$bdd = new PDO('mysql:host=localhost;dbname=prof;charset=utf8', 'root', '');
$res = $bdd->query("SELECT * FROM emploi");

if(isset($_POST["l1"]) && isset($_POST["l2"]) && isset($_POST["l3"]) && isset($_POST["l4"]) && isset($_POST["jour"]))
{
	$up=$bdd->prepare("UPDATE emploi SET m8=?,m10=?,a14=?,a16=? WHERE jour=?");
	$up->execute(array($_POST["l1"],$_POST["l2"],$_POST["l3"],$_POST["l4"],$_POST["jour"]));
	header("Location: emploi.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Emploi du temps</title>
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

table
{
	border-collapse: collapse;
	justify-content: center;
	align-items: center;
}

td,th
{
	border : 3px solid black;
	text-align: justify;
	width: 250px;
	height: 50px;
	padding: 12px;
	text-align: center;
	font-weight: bold;
	font-size: 19px;
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

.emploi
{
	text-align: center;
	margin-top: 50px;
}

#tab td
{
	border : none;
	text-align: center;
	font-size: 20px;
}

#tab input
{
	width: 60px;
	height: 30px;
	text-align: center;
	font-size: 20px;
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
	width: 35%;
	height: 40%;
	display: flex;
	justify-content: center;
	align-items: center; 
	flex-direction: column;
	text-align: center;
	border-radius: 8px;
}

.btn1
{
	padding: 12px;
	background: none;
	font-size: 19px;
	font-weight: bold;
	cursor: pointer;
	border : none;
}

select
{
	height: 30px;
	font-size: 20px;
	background: none;
	border : none;
	cursor: pointer;
}

.modp
{
	margin-top: 20px;
	font-size: 20px;
	margin-left: 10px;
	font-weight: bold;
}

.modp button
{
	padding: 3px;
	font-weight: bold;
	cursor: pointer;
	background: none;
	border : none;
	font-size: 17px;
	transition: 1s;
	transition-property: transform;
}

.modp button:hover
{
	
	transform: scale(1.06);

}

footer
 {
 	margin-top: 130px;
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
				<li><a href="eleve.php">Etudiants</a></li>
				<li><a class="active" href="emploi.php">Emplois du Temps</a></li>
				<li><a href="index.php">Se déconnecter</a></li>
			</ul>
		</nav>
	</header>

	<div class="emploi">
		<h2>EMPLOI DU TEMPS - 2020/2021</h2>
		<br/>
		<table>
			<tr>
				<th>Jours</th>
				<th>8h-10h</th>
				<th>10h-12h</th>
				<th>14h-16h</th>
				<th>16h18h</th>
			</tr>
			<?php
			while ($don=$res->fetch()) 
			{?>
				<tr>
					<td><?php echo $don["jour"]; ?></td>
					<?php
						if($don["m8"]==1)
						{?>
							<td style="background: red;"></td>
						<?php	
						}
						else
						{?>
							<td></td>
						<?php
						}
						if($don["m10"]==1)
						{?>
							<td style="background: red;"></td>
						<?php	
						}
						else
						{?>
							<td></td>
						<?php
						}
						if($don["a14"]==1)
						{?>
							<td style="background: red;"></td>
						<?php	
						}
						else
						{?>
							<td></td>
						<?php
						}
						if($don["a16"]==1)
						{?>
							<td style="background: red;"></td>
						<?php	
						}
						else
						{?>
							<td></td>
						<?php
						}
					?>
				</tr>
			<?php
			}
			?>
		</table>
	</div>

	<div class="modp">
		<p>Si vous voulez modifier votre emploi du temps, cliquer sur : <button id="modi">Modifier</button></p>
	</div>

	<div class="modal-bg">
		<form class="modal" method="post" action="emploi.php">
			<h3 style="text-align: center;">Ecrivez 1 si vous aurez un cours sinnon 0</h3>
			<br/>
			<select id="list">
				<option>Selectionner un jour</option>
	            <option value="LUN">Lundi</option>
	            <option value="MAR">Mardi</option>
	            <option value="MER">Mercredi</option>
	            <option value="JEU">Jeudi</option>
	            <option value="VEN">Vendredi</option>
        	</select>
			<input style="opacity: 0;" id="jour" type="text" name="jour">
			<table id="tab">
				<tr>
					<td>8h-10h</td>
					<td>10h-12h</td>
					<td>14h-16h</td>
					<td>16h-18h</td>
				</tr>
				<tr>
					<td><input type="text" name="l1" required=""></td>
					<td><input type="text" name="l2" required=""></td>
					<td><input type="text" name="l3" required=""></td>
					<td><input type="text" name="l4" required=""></td>
				</tr>
			</table>
			<br/>
			<input name="ajout" class="btn1" type="submit" value="Modifier">
			<br/>
		</form>
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
	var modi = document.getElementById("modi");
	var modalbg = document.querySelector(".modal-bg");
	var list = document.getElementById("list");
	var jour = document.getElementById("jour");

	modi.addEventListener("click",function(){
			modalbg.classList.add("bg-active");
		});

    list.addEventListener("click",function(){
    	var selectedValue = document.getElementById("list").value;
    	jour.value=selectedValue;
    })
</script>
</html>
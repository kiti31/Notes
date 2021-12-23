<!DOCTYPE>
<html>
<head>
<style>
* {	box-sizing: border-box;}
	
body 
{	
	font-family: Arial, Helvetica, sans-serif;
}

/*Styles the themecolour options title, makes the text white and aligns it to the left with a little indent*/
.textstyle
{
	color:white; 
	text-align:Left;
	text-indent: 10px;
}

/*Gives colour to the Header for Home and Notes*/
.topnav 
{
	overflow: hidden;
	background-color: #333;
}

/*Specifies text colour and Header size for the navigation bar*/
.topnav a 
{
	float: left;
	color: #f2f2f2;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
	font-size: 17px;
}

/Shows colour when hovering over the links in the navigation bar*/
.topnav a:hover 
{
	background-color: #ddd;
	color: black;
}

/*Shows which page is currently in use for the navigation bar*/
.topnav a.active 
{
	background-color: #4CAF50;
	color: white;
}

/*Styles the header which has the page name*/
.header 
{	grid-area: header;
	padding: 0.05px;
	text-align: center;
	background: #000000;
	color: white;
}

.grid-container 
{
	display: grid;
	grid-template-areas:
		'header header header header header header header header header header'
		'subject subject subject subject subject subject subject subject subject subject'
		'recall notes notes notes notes notes notes notes notes notes'
		'summary summary summary summary summary summary summary summary summary summary';
		grid-column-gap: 10px;
}
	
.recall,
.notes 
{
	padding: 10px;
	height: 300px;
}
	.subject 
	{
		grid-area: subject;
		padding: 10px;
	}
	.recall 
	{
		grid-area: recall;
		padding: 10px;
	}

	.notes 
	{
		grid-area: notes;
		padding: 10px;
	}

	.summary 
	{
		grid-area: summary;
		padding: 10px;
		height: 100px;
	}

	@media (max-width: 600px) 
	{
		.grid-container 
		{
			grid-template-areas:
				'header header header header header header header header header header'
				'subject subject subject subject subject subject subject subject subject subject'
				'recall recall recall recall recall recall recall recall recall recall'
				'notes notes notes notes notes notes notes notes notes notes'
				'summary summary summary summary summary summary summary summary summary summary';
		}
	}

	textarea
	{
		box-sizing: border-box;
		border: 1px solid #DDC189;
		border-radius: 3px;
		width: 100%;
		padding: 10px;
		margin: 10px 0;
		outline: none;
		transition: 0.3s;
	}
	textarea:focus
	{
		border-color: Red;
		box-shadow:0 0 10px 0 Red;
	}

</style>
	<title> Home </title>
  
</head>
	<body
	<?php
	//to start a session which stores info across multiple pages
	session_start(); 
	if(isset($_GET['colour']))
	{
		$colour = $_GET['colour'];
		$_SESSION['colour']=$colour;
	}

	@$clr_use_session = $_SESSION['colour'];
	echo "bgcolor=$clr_use_session";

	?>
	>
	<p>
		
		<! -- Styling header of page -->
		<div class="header">
		  <h1>Home</h1>
		</div> 
		
		<! -- The links of Home page and Notes page styled with topnav class -->
		<div class="topnav">
			<a class="active" href="Home.php">Home</a>
			<a href="Notes.php">Notes</a>
		</div>
		
		<div class="topnav">
		
		<! -- Theme colour options -->
		<br><div class="textstyle"> Theme Colour Options</div> 
		<a href="?colour=white">White</a>
		<a href="?colour=SaddleBrown">Brown</a>

		<a href="?colour=brown">Red</a>
		<a href="?colour=maroon">Maroon</a>
		<a href="?colour=orange">Yellow</a>
		<a href="?colour=DarkCyan">Teal</a>

		<a href="?colour=LightPink">Light Pink</a>
		<a href="?colour=LightCoral">Coral</a>
		<a href="?colour=RosyBrown">Dusty Pink</a>
		</div>

		<! -- Post form is used to take in inputs,there are 4 inputs -->
		<br><form method="post"></br>
		<div class="grid-container">
			<div class="subject">
				Subject Name:<br>
				<textarea name="Atextdata" rows ="1" cols="20" placeholder="Write subject name here..."></textarea><br>
			</div>
			<div class="recall">
				Recall:<br>
				<textarea name="Btextdata" rows ="15" cols="20" placeholder="Keywords"></textarea><br>
			</div>
			<div class="notes">
				Notes:<br>
				<textarea name="Dtextdata" rows ="15" cols="20" placeholder="Notes"></textarea><br>
			</div>
			<div class="summary">
				Summary:<br>
				<textarea name="Ctextdata" rows ="2" cols="20" placeholder="Write your summary here..."></textarea><br>
			</div>
		</div>
			<! -- This input is a submit type while the rest are text type -->
			<input type="submit" name="submit">
				
		</form>
	

		

	
	</body>
</html>

<?php
//In this php code input from html above is inserted into a texfile of na Notes.txt             
if(isset($_POST['Atextdata']))
{

$Adata=$_POST['Atextdata'];
$Bdata=$_POST['Btextdata'];
$Cdata=$_POST['Ctextdata'];
$Ddata=$_POST['Dtextdata'];

//textfile is opened
$fp = fopen('Class Notes.txt', 'a');

//Data is structured with $txt variable
$txt=$Adata."\n\nRecall:".$Bdata."\n\nSummary:".$Cdata."\n\nNotes:".$Ddata."\n\n\n\n";

//A date function is assigned to variable $NoteDate to show current date and time user submits input
$NoteDate = (new DateTime())->setTimeZone(new DateTimeZone('Asia/Kuala_Lumpur'))->format('d-m-Y H:i:A');
$dxt=$NoteDate."\n\nSubject Name:";

//Data is written into textfile
fwrite($fp, $dxt); 
fwrite($fp, $txt);

//textfile is closed
fclose($fp);

}

?>
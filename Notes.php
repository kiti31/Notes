<!DOCTYPE>
<html>
<head>
<style>
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

/*Styles the header which has the page name*/
.header 
{
	padding: 0.05px;
	text-align: center;
	background: #000000;
	color: white;
}

/*Styles the output to have agreen glow for border and resizes the ouput box*/
iframe 
{
	border-color: green;
	box-shadow:0 0 10px 0 green;
	height: 400px;
	width: 100%;
	resize: both;
	overflow: auto;
	
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
	
</style>
	<title> Notes </title>
  
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
		<! -- Styling header of page -->
		<div class="header">
		  <h1>Notes</h1>
		</div> 
		
		<! -- The links of Home page and Notes page styled with topnav class -->
		<div class="topnav">
			<a href="Home.php">Home</a>
			<a class="active" href="Notes.php">Notes</a>
		</div>
		
		<! -- Theme colour options -->
		<div class="topnav">
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


		<br></br>
		
		<! -- Used ti display output from textfile -->
		<iframe id="myframe"></iframe>
		

		<p>Click the button to view all notes.</p>

		<button onclick="myFunction()">View Notes</button>
		
		<! -- JS function to open and display text file -->
		<script>
		function myFunction() 
		{
		  document.getElementById("myframe").src = "Class Notes.txt";
		 
		}
		</script>
		
		
	</body>
</html>


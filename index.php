<?php
$servername = "localhost";
$username = "id10048609_database";
$password = "database";
$dbname = "id10048609_database";

// Create connection
$link =  mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_error()) {
    die("Connection failed: ");
} 


?>























<!DOCTYPE html>
<html>



	<head>
	


		<title>Credit Managment Website</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

		<script src="jquery-ui-1.12.1/jquery-ui.js"></script>

		<link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.css">

		
		<style type="text/css">
			
			body {
				background-color: black;
			}

			#HeadBar {
				width: 99%;
				height: 40px;
				background-color: #FF5733;
				padding: 10px;
				//margin: "null";
				//padding-top: "null"; 
			}

			#MenuPanel {
				width: 200px;
				border: 1px solid #900C3F;
				background-color: #2A69E1;
				height: 500px;
				float: left;
			}

			#contentBox {
				float: left;
				height: 490px;
				width: 700px;
				margin-right: : 15px;
				margin-top: 10px;
				margin-left: 80px;
				border: 1px solid #900C3F;
				text-align: left;
				background-color: #bfff00;
				overflow: scroll;
				::-webkit-scrollbar {width: 10px;}; 
			}

			.rightBox {
				float: right;
				border: 1px solid #900C3F;
				height: 490px;
				width: 200px;
				margin-right: : 15px;
				margin-left: 50px;
				margin-top: 10px;
			}

			.partRightBox {
				border: 1px solid #900C3F;
				height: 152px;
				padding: 5px;
				font-size: 100%;
				font-family: jokerman;
				color: blue;
				background-color: #FF00FF;
				overflow: scroll;
				::-webkit-scrollbar {width: 10px;};
			}

			.listElements {
				font-size: 100%;
				font-family: times new roman;
				color: #800080;
			}

			.LogAndNew {
				float: right;
				padding: 6px;
				padding-left: 15px;
				padding-right: 15px;
				font-family: comic sans ms;
				border: 1px solid #900C3F;
				background-color: #FFC300;
				font-size: 100%; 
			}

			.menuButton {
			    background-color: #3498DB;
				color: white;
				padding: 16px;
				font-size: 16px;
			    cursor: pointer;
			    border: 1px solid #900C3F;
	     	}

	     	.dropbtn:hover, .dropbtn:focus {
  				background-color: #2980B9;
			}

			#categories {
  				position: relative;
 		 		display: inline-block;
 		 		width: 200px;
			}

			.dropdown-content {
				display: none;
				position: absolute;
		        background-color: #5DE67F;
				min-width: 200px;
				z-index: 1;
			}

			.dropdown-content a {
			    color: white;
			    padding: 12px 16px;
			    border: 1px solid #900C3F;
			    display: block;

			}

			.dropdown-content a:hover {
				background-color: #ddd
			}

			.show {
				display:block;
			}

			#frame {
				position: relative;
				float: left;
				margin: 20px;
			}

			.wrap {
				position: relative;
				margin: 8px;
				margin-bottom: 0px;

			}
			
			table, th, td {
                border: 1px solid black;
            }
   

		</style>



	</head>



<body>


	<div id="HeadBar">
		
		<div id="logo"> <img src="LOGO.jpg" alt="image" width= "200" height="38"> 

			<a href="project2.html"><button class="LogAndNew">Log Out</button></a>

			<a href="project1.html"><button class="LogAndNew">Create New Acoount</button></a>

		</div>

	</div>


	<div id="MenuPanel">
		
		<div id="home" class="menuButton">Home</div>
		<div id="about" class="menuButton">About</div>
		<div id="explore" class="menuButton">Explore</div>
		
		<div id="categories">
			<button onclick="myFunction()" class="menuButton">Categories</button>
				<div id="myDropdown" class="dropdown-content">
					<a href="#" >Ambitious</a>
					<a href="#" >Travelling</a>
					<a href="#" >Emotional</a>
					<a href="#" >Poetry</a>
					<a href="#" >Adventure</a>
					<a href="#" >Lifestyle</a>
				</div>
		</div>

		<div id="settings" class="menuButton">Settings</div>

	</div>	

	<div id="contentBox">
	    
	    <h1 style="text-align:center; color:blue;" >The User Table</h1>
	    
		<?php 
		$query = "SELECT * FROM users";
        $result = mysqli_query($link,$query);
		if ($result->num_rows > 0) {
    echo "<table style='width:100%'><tr><th>ID</th><th>Name</th><th>Email</th><th>Credit</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td> " . $row["email"]. "</td><td>" . $row["credit"]. "</td></tr>";
    }
    echo "</table>";
    } else {
        echo "0 results";
    }       ?>
		
		<br><br><br><br><br><br>


	    <h1 style="text-align:center; color:blue;" >Fill Form For Transfer</h1>



	<form method = "post">
    <input name="from" type="text" placeholder="transfer from">
    <input name="to" type="text" placeholder="transfer to">
    <input name="credit" type="int" placeholder="credits">
    <input type="submit" value = "LET'S DO IT" onclick="refresh()">
    </form>
    
	

	
	<?php
	
	

    if (array_key_exists('from', $_POST) OR array_key_exists('to', $_POST) OR array_key_exists('credit', $_POST)) {

        if ($_POST['from'] == '') {
            
            echo "<p>from name is required.</p>";
            
        } 
        else {
            
            $query = "SELECT `name` FROM `users` WHERE name = '".$_POST['from']."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) == 0) {
                
                echo "<p>no such giving user</p>";
                goto incomp;
            }
            }    
        if ($_POST['to'] == '') {
            
            echo "<p>to name is required.</p>";
	
    	}
    	else {
            
            $query = "SELECT `name` FROM `users` WHERE name = '".$_POST['to']."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) == 0) {
                
                echo "<p>no such taking user</p>";
                goto incomp;
            }
            }    
    	if ($_POST['credit'] == '') {
            
            echo "<p>credit amount is required.</p>";
            
        }
        else {$query = "SELECT credit FROM users WHERE name = '".$_POST['from']."'";
        $result = mysqli_query($link,$query);} 
        if(mysqli_fetch_assoc($result) < $_POST['credit']) {
            echo "Credits transferred cannot be more than " . mysqli_num_rows($result) . "<br>";
            goto incomp;
        }
         else {
                
                $query = "INSERT INTO `transfers` (`givenfrom`, `givento`, `credit`) VALUES ('".$_POST['from']."', '".$_POST['to']."', '".$_POST['credit']."')";
                
                if (mysqli_query($link, $query)) {
                    
                    echo "<p>Transaction Successful</p>";
                    goto update;
                    
                } else {
                    
                    echo "<p>Some error occured. Please try again later.</p>";
                    
                }
                
            }
            
            update:
                
            $query = "update users set credit = credit + " . $_POST['credit'] . " where name='" . $_POST['to'] . "'";
            mysqli_query($link,$query);
            $query = "update users set credit = credit - " . $_POST['credit'] . " where name='" . $_POST['from'] . "'";
            mysqli_query($link,$query);
            
            incomp: 
            
    }        

?>
	
	
	<br><br><br><br><br><br><br>
	
	
    <h1 style="text-align:center; color:blue;" >The Transfer Table</h1>
	
	
    <?php 
		$query = "SELECT * FROM transfers";
        $result = mysqli_query($link,$query);
		if ($result->num_rows > 0) {
    echo "<table style='width:100%'><tr><th>Given From</th><th>Given To</th><th>Credit</th><th>Date & Time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["givenfrom"]. "</td><td>" . $row["givento"]. "</td><td> " . $row["credit"]. "</td><td>" . $row["datetime"]. "</td></tr>";
    }
    echo "</table>";
    } else {
        echo "0 results";
    }       
    ?>
    
    
    <script>
    function refresh() {
        window.location.reload();
    }
    </script>
	
	
	
	</div>
	

	<div class="rightBox">
		
		<div class="partRightBox" style="font-size: 140%">Activities:-
			<ul class="listElements">
				<li>bla bla</li>
				<li>bla bla</li>
				<li>bla bla</li>
				<li>bla bla</li>
				<li>bla bla</li>
			</ul>
		</div>
		
		<div class="partRightBox" style="font-size: 140%">Notifications:-
			<ul class="listElements">
				<li>bla bla</li>
				<li>bla bla</li>
				<li>bla bla</li>
				<li>bla bla</li>
				<li>bla bla</li>
			</ul>
		</div>
		
		<div class="partRightBox" style="font-size: 140%">Treandings:-
			<ol class="listElements">
				<li>bla bla</li>
				<li>bla bla</li>
				<li>bla bla</li>
				<li>bla bla</li>
				<li>bla bla</li>
			</ul>
		</div>

	</div>






	<script type="text/javascript">
		

		function myFunction() {
    		document.getElementById("myDropdown").classList.toggle("show");
		}

		

	</script>


</body>



</html>
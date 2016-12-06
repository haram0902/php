<?php
session_start();
if (isset($_SESSION['username'])){
	echo '<script>location.href="/user"</script>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shopping</title>

		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
        
		<style>
            html, body {
                height: 100%;
            }

            body {
				background-color: #C1D9C2;
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-family: 'Righteous';
            }
			.topmenu{
				text-align: left;
				background-color: #878885;
				height: 50px;
				box-shadow: 0 2px 10px 0px grey;
			}
			.topborder{
				height: 10px;
			}
            .container {
				height: 91%;
                text-align: center;
                display: table-cell;
            }

            .content {
                text-align: center;
                display: inline-block;
            }
			.image{
				padding-top: 4px;
				padding-left: 20px;
				float: left;
			}
			.menu{
				color: black;
                font-size: 30px;
				font-weight: bold;
				text-shadow: 0 0 1px black;
				float: left;
				padding-left: 10px;
				padding-top: 5px;
			}
			.form{
				background-color: #DFEBF9;
				border: 1px #DFEBF9;
				border-radius: 10px;
				margin-top: 50px;
				width: 500px;
				height: 500px;
				box-shadow: 0 4px 10px 4px grey;
				padding: 20px;
			}
			#input{
				position: relative;
				font-size: 22px;
				font-weight: 600;
				height: 25px;
				width: 70%;
				margin-top: 10px;
				padding: 5px 10px;
				background: none;
				color: black;
				border: 2px solid #824B3D;
				border-radius: 2px;
			}
			.letter{
				font-size: 40px;
				font-weight: bold;
				font-family: 'Righteous';
				color: #878885;
				margin-bottom: 30px;
				text-shadow: 0 0 2px black;
			}
			.button{
				color: #DFEBF9;
				font: bold 15px 'Righteous';
				font-weight: 800;
				background: none;
				text-decoration: none;
				text-shadow: 0 0 4px #878885;
				border: 5px solid;
				border-color: #401D1B;
				border-radius:10px;
				padding: 12px 30px 12px 30px;
				margin: 30px;
				margin-top:90px;
				font-size: 150%;
				transition: all 0.3s;
				box-shadow: 0 2px 12px 2px grey;
			}
			.button:hover{
				border: 5px solid;
				color: #401D1B;
				border-color: #401D1B;
				background-color: lightgrey;
			}
			#font{
				position: absolute;
				font-size: 22px;
				font-weight: bold;
				font-family: Arial;
				color: grey;
				margin-top: 10px;
				padding: 5px 10px;
				margin-left: 65px;
			}
        </style>
    </head>
    <body>
        <div class="container">
			<div class="topborder"></div>
			<div class="topmenu">
				<div class="image"><a href="/"><img src="cart.png" width=40 height=40></img></a></div>
				<a href="/"><div class="menu">Shopping</div></a>
			</div>
            <div class="content">
				<form action="signup.php" method="post">
					<div class="form">
						<div class="letter">Sign Up</div>
						<input id="input" type="text" name="username" placeholder="Username:" required></input>
						<input id="input" type="password" name="password" placeholder="Password:" required></input>
						<input id="input" type="password" name="cpassword" placeholder="Confirm Password:" required></input>
						<input id="input" type="text" name="fname" placeholder="First Name:" required></input>
						<input id="input" type="text" name="lname" placeholder="Last Name:" required></input>
						<button class="button" type="submit">Sign Up</button>
					</div>
				</form>
            </div>
        </div>
    </body>
</html>
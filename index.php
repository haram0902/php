<?php
session_start();
$_SESSION['password']='rhkgkr6';
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

            .title {
				border: 10px solid;
				border-color: #DFEBF9;
				background-color: #DFEBF9;
				box-shadow: 0 2px 12px 2px grey;
				padding-top: 15px;
				padding-bottom: 20px;
				padding-left: 50px;
				padding-right: 50px;
				border-radius: 25px;
				color: #878885;
                font-size: 150px;
				margin-bottom: 90px;
				margin-top: 100px;
				font-weight: bold;
				text-shadow: 0px 0px 4px black;
            }
            
            .button a{
				color: #DFEBF9;
				font: bold 15px 'Righteous';
				font-weight: 800;
				text-decoration: none;
				text-shadow: 0 0 4px #878885;
				border: 5px solid;
				border-color: #DFEBF9;
				border-radius:10px;
				padding: 12px 30px 12px 30px;
				margin: 30px;
				margin-top:90px;
				font-size: 200%;
				transition: color 0.3s, border-color 0.3s, background-color 0.8s;
				box-shadow: 0 2px 12px 2px grey;
			}
			.button a:visited{
				color: #DFEBF9;
			}
			.button a:hover{
				border: 5px solid;
				color: #401D1B;
				border-color: #401D1B;
				background-color: lightgrey;
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
				<?php
				if (isset($_SESSION['username'])){
					echo '<script>location.href="/user"</script>';
				}
				else{
					echo '
					<div class="title">Shopping</div>
					<div class="button">
						<a class="button"href="/signin">Sign In</a>
						<a href="/signup">Sign Up</a>
					</div>';
				}
				?>
            </div>
        </div>
    </body>
</html>
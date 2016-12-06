<?php
session_start();
if(isset($_SESSION['id']) and $_SESSION['type'] == 1){}
else{
	echo '<script>window.location.href="/"</script>';
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
				vertical-align: middle;
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
			.text{
				font-family: Arial;
				color: rgb(220,220,220);
				border-color: white;
				font-size: 14px;
				font-weight: bold;
				float: right;
				padding-right: 15px;
				padding-left: 15px;
				padding-top: 16px;
				padding-bottom: 16px;
				text-shadow: 0 0 1px grey;
				transition: all 0.5s;
			}
			.marginright{
				color: #878885;
				float: right;
				width: 40px;
				height: 40px;
				background-color: none;
			}
			.text:hover{
				background-color: rgb(90,90,90);
				color: white;
			}
			.welcome{
				font-family: Arial;
				color: rgb(220,220,220);
				border-color: white;
				font-size: 14px;
				font-weight: bold;
				float: right;
				padding-right: 10px;
				padding-top: 16px;
				padding-bottom: 16px;
				text-shadow: 0 0 1px grey;
				transition: all 0.5s;
			}
			.nodeco{
				text-decoration: none;
			}
			.item{
				width: 600px;
				height: 50px;
				background-color: #DFEBF9;
				border-radius: 5px;
				margin: 10px;
				box-shadow: 0 2px 7px 2px grey;
			}
			.name{
				font-family: 'Righteous';
				font-size: 15pt;
				font-weight: bold;
				float: left;
				text-shadow: 0 0 2px grey;
				margin-left: 40px;
				margin-top: 10px;
			}
			.delete{
				font-family: 'Righteous';
				font-size: 13pt;
				font-weight: bold;
				border: 1px solid black;
				background-color: rgb(170,40,40);
				float: right;
				margin-right: 30px;
				margin-top: 10px;
				width: 140px;
				height: 30px;
				border-radius: 5px;
				text-shadow: 0 0 2px black;
				box-shadow: 0 1px 7px 1px grey;
				transition: all 0.3s;
				color: white;
			}
			.delete:hover{
				background-color: rgb(140,30,30);
			}
        </style>
    </head>
    <body>
        <div class="container">
			<div class="topborder"></div>
			<div class="topmenu">
				<div class="image"><a href="/"><img src="../../cart.png" width=40 height=40></img></a></div>
				<a href="/"><div class="menu">Shopping</div></a>
				<div class="marginright"></div>
				<a href="/logout.php"><div class="text">Log Out</div></a>
				<a href="/user/history"><div class="text">History</div></a>
				<?php
					echo '<a href="/user/cart"><div class="text">My Cart</div></a>';
					if ($_SESSION['type']==1){
						echo '<a href="/user/product"><div class="text">Products</div></a>';
					}
				?>
				<a href="/"><div class="text">Home</div></a>
				<?php
					echo '<a href="/"><div class="text">'.$_SESSION['lname'].', '.$_SESSION['fname'].'</div></a>';
					echo '<div class="welcome">Welcome, </div>';
				?>
			</div>
            <div class="content">
				<?php
					$conn = pg_Connect("user=postgres password=".$_SESSION['password']." dbname=mpharam");
					$query = "select * from products order by id";
					$result = pg_query($conn, $query);
					while ($row=pg_fetch_row($result)){
						echo '<div class="item">
							<div class="name">ID: '.$row[4].' | NAME: '.$row[0].'</div>
							<a class="nodeco" href="delete.php?id='.$row[4].'"><div class="delete">Delete</div></a>
						</div>';
					}
				?>
            </div>
        </div>
    </body>
</html>
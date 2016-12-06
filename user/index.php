<?php
session_start();
if(isset($_SESSION['id'])){}
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
			.item{
				border-radius: 5px;
				background-color: #DFEBF9;
				height: 300px;
				width: 250px;
				margin: 30px;
				float: left;
				box-shadow: 0 2px 14px 2px grey;
			}
			.itemimage{
				border-radius: 2px;
				width: 200px;
				height: 200px;
				margin: 15px;
				box-shadow: 0 1px 7px 1px grey;
			}
			.itemtext{
				font-family: 'Righteous';
				font-size: 18pt;
				color: black;
				width: 210px;
				text-decoration: none;
				margin-left: 20px;
				margin-top: 10px;
				background-color: #878885;
				border-radius: 12px;
				box-shadow: 0 1px 7px 1px grey;
				text-shadow: 0 0 2px grey;
				transition: all 0.3s;
			}
			.itemtext:hover{
				color: orange;
				box-shadow: 0 2px 14px 2px grey;
			}
			.itemimage:hover .itemtext{
				color: orange;
				box-shadow: 0 2px 14px 2px grey;
			}
			.item:hover .itemtext{
				color: orange;
				box-shadow: 0 2px 14px 2px grey;
			}
			.itembutton{
				text-decoration: none;
			}
        </style>
    </head>
    <body>
        <div class="container">
			<div class="topborder"></div>
			<div class="topmenu">
				<div class="image"><a href="/"><img src="cart.png" width=40 height=40></img></a></div>
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
					$conn = pg_Connect("user=postgres password=rhkgkr6 dbname=mpharam");
					$query = "select * from products where status='available' order by id;";
					$result = pg_query($conn, $query);
					$count = 1;
					while ($row = pg_fetch_row($result)){
						echo '<div class="item">
							<a href="product.php?id='.$row[4].'"><img src="../image/'.$row[4].'.jpg" class="itemimage"></img></a>
							<a class="itembutton" href="product.php?id='.$row[4].'"><div class="itemtext">'.$row[0].'</div></a>
							</div>';
						if ($count%3==0){
							echo '</br>';
						}
						$count = $count + 1;
					}
				?>
            </div>
        </div>
    </body>
</html>
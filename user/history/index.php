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
			.nodeco{
				text-decoration: none;
			}
			.box{
				width: 800px;
				height: 80px;
				margin: 20px;
				color: rgb(50,50,50);
				background-color: #DFEBF9;
				padding: 10px;
				border-radius: 20px;
				border: 3px solid black;
			}
			.box:hover{
				border: 5px solid black;
				padding: 8px;
			}
			.box:hover .order{
				color: orange;
				text-shadow: 0 0 5px black;
			}
			.box:hover .date{
				color: orange;
				text-shadow: 0 0 5px black;
			}
			.box:hover .total{
				color: orange;
				text-shadow: 0 0 5px black;
			}
			.order{
				font-family: 'Righteous';
				font-size: 40pt;
				font-weight: bold;
				float: left;
				margin-left: 40px;
				margin-top: 5px;
				text-shadow: 0 0 2px black;
				transition: all 0.3s;
			}
			.total{
				font-family: 'Righteous';
				font-size: 30pt;
				font-weigth: bold;
				float: right;
				margin-right: 40px;
				margin-top: 10px;
				text-shadow: 0 0 1px black;
				transition: all 0.3s;
			}
			.date{
				float: left;
				margin-left: 10px;
				margin-top: 50px;
				text-shadow: 0 0 1px grey;
				transition: all 0.3s;
			}
			.history{
				font-family: 'Righteous';
				font-size: 30pt;
				font-weight: bold;
				text-align: left;
				margin-top: 20px;
				position: absolute;
				top: 8%;
				left: 20%;
				color: rgb(70,70,70);
				text-shadow: 0 0 2px grey;
			}
			.marginbottom{
				margin-bottom: 130px;
			}
			.noorder{
				margin-top: 15%;
				font-size: 25pt;
				padding: 10px;
			}
        </style>
    </head>
    <body>
        <div class="container">
			<div class="topborder"></div>
			<div class="topmenu">
				<div class="image"><a href="/"><img src="../cart.png" width=40 height=40></img></a></div>
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
				<div class="history">Order History:</div>
				<div class="marginbottom"></div>
				<?php
					$conn = pg_Connect("user=postgres password=rhkgkr6 dbname=mpharam");
					
					$query = "select order_id from usertoorder where user_id=".$_SESSION['id']." and status='ordered';";
					$result = pg_query($conn, $query);
					$count = 1;
					$isthere = 0;
					while ($row = pg_fetch_row($result)){
						$isthere = 1;
						$query = "select date,total from orders where id=".$row[0].";";
						$result2 = pg_query($conn, $query);
						$row2 = pg_fetch_row($result2);
						echo '<a class="nodeco" href="/history.php?id='.$row[0].'&total='.$row2[1].'">
							<div class="box">
							<div class="order">Order '.$count.'</div>
							<div class="date">Date: '.$row2[0].'</div>
							<div class="total">Total: Php '.$row2[1].'</div>
						</div></a>';
					}
					if ($isthere == 0){
						echo '<div class="noorder">No order history found</div>';
					}
				?>
            </div>
        </div>
    </body>
</html>
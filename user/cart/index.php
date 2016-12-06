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
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		
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
				font-size: 17pt;
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
			.mycart{
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
			.close{
				background: #606061;
				color: #FFFFFF;
				line-height: 25px;
				float: right;
				text-align: center;
				margin-top: -10px;
				margin-right: -12px;
				width: 24px;
				text-decoration: none;
				font-weight: bold;
				border-radius: 12px;
				box-shadow: 1px 1px 3px #000;
			}
			.modalDialog {
				position: fixed;
				font-family: Arial, Helvetica, sans-serif;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				background: rgba(0, 0, 0, 0.8);
				z-index: 99999;
				opacity:0;
				-webkit-transition: opacity 400ms ease-in;
				-moz-transition: opacity 400ms ease-in;
				transition: opacity 400ms ease-in;
				pointer-events: none;
			}
			.modalDialog:target {
				opacity:1;
				pointer-events: auto;
			}
			.modalDialog > div {
				text-align: center;
				width: 400px;
				height: 200px;
				position: relative;
				margin: 10% auto;
				padding: 5px 20px 13px 20px;
				background: rgb(240,240,240);
				border: 1px solid black;
			}
			.close2{
				background: #606061;
				color: #FFFFFF;
				line-height: 25px;
				position: absolute;
				right: -12px;
				text-align: center;
				top: -10px;
				width: 24px;
				text-decoration: none;
				font-weight: bold;
				-webkit-border-radius: 12px;
				-moz-border-radius: 12px;
				border-radius: 12px;
				-moz-box-shadow: 1px 1px 3px #000;
				-webkit-box-shadow: 1px 1px 3px #000;
				box-shadow: 1px 1px 3px #000;
			}
			.nodeco{
				text-decoration: none;
			}
			.modaltext{
				font-family: Arial;
				font-size: 15pt;
				font-weight: bold;
				margin: 30px;
			}
			.yes{
				background-color: rgb(50,150,50);
				border-radius: 8px;
				padding: 10px;
				padding-left: 20px;
				padding-right: 20px;
				margin: 10px;
				font-family: 'Righteous';
				font-size: 15pt;
				font-weight: bold;
				text-decoration: none;
				color: white;
				text-shadow: 0 0 2px black;
				transition: color 0.3s, text-shadow 0.3s;
			}
			.yes:hover{
				border: 2px solid black;
				margin: 8px;
				color: orange;
				text-shadow: 0 0 5px black;
			}
			.no{
				background-color: rgb(150,50,50);
				border-radius: 8px;
				padding: 10px;
				padding-left: 24px;
				padding-right: 24px;
				font-family: 'Righteous';
				font-size: 15pt;
				font-weight: bold;
				text-decoration: none;
				color: white;
				text-shadow: 0 0 2px black;
				transition: color 0.3s, text-shadow 0.3s;
			}
			.no:hover{
				border: 2px solid black;
				margin: -2px;
				color: orange;
				text-shadow: 0 0 5px black;
			}
			.notext{
				margin-top: 15%;
				font-size: 25pt;
				padding: 10px;
			}
			.border{
				margin-top: 100px;
			}
			.total{
				font-family: 'Righteous';
				font-size: 30pt;
				font-weight: bold;
				margin-bottom: 30px;
			}
			.confirm{
				border: 2px solid black;
				font-family: 'Righteous';
				font-size: 40pt;
				font-weight: bold;
				width: 250px;
				background-color: rgba(50,150,50,0.35);
				color: white;
				padding: 10px;
				border-radius: 10px;
				padding-left: 100px;
				padding-right: 100px;
				text-decoration: none;
				text-shadow: 0 0 5px black;
				transition: all 0.3s;
			}
			.confirm:hover{
				background-color: rgb(50,150,50);
				text-shadow: 0 0 14px black;
			}
			.marginbottom{
				margin-bottom: 130px;
			}
        </style>
    </head>
    <body>
        <div class="container">
			<div class="topborder"></div>
			<div class="topmenu">
				<div class="image"><a href="/"><img src="/cart.png" width=40 height=40></img></a></div>
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
				<div class="mycart">My Cart:</div>
				<div class="border"></div>
				<?php 
					$conn = pg_Connect("user=postgres password=rhkgkr6 dbname=mpharam");
					
					$query = "select order_id from usertoorder where user_id=".$_SESSION['id']." and status='current'";
					$result = pg_query($conn, $query);
					$row = pg_fetch_row($result);
					$total = 0;
					$isthere = false;
					if($row != null){
						$isthere = true;
						$order_id = $row[0];
						
						$query = "select product_id, quantity from ordertoproduct where order_id=".$order_id.";";
						$result = pg_query($conn, $query);
						$count = 1;
						while ($row = pg_fetch_row($result)){
								$query = "select * from products where id=".$row[0].";";
								$result2 = pg_query($conn, $query);
								$row2 = pg_fetch_row($result2);
								$total = $total + ($row[1]*$row2[5]);
								echo '<div class="item">
										<a href="#delete'.$row[0].'" title="Close" class="close" onclick="click('.$row[0].')">X</a>
										<a href="/product.php?id='.$row[0].'"><img src="../image/'.$row[0].'.jpg" class="itemimage"></img></a>
										<a class="itembutton" href="/product.php?id='.$row[0].'"><div class="itemtext">'.$row2[0].' : '.$row[1].'</div></a>
									</div>
									<div id="delete'.$row[0].'" class="modalDialog">
										<div><a href="#close" title="Close" class="close2">X</a>
											<div class="modaltext">Are you sure you want to remove?</div>
											<div>
												<a href="/remove.php?id='.$row[0].'" class="yes">YES</a>
												<a href="#close" class="no">NO</a>
											</div>
										</div>
									</div>';
								if ($count%3==0){
									echo '<br>';
								}
								$count = $count+1;
						}
					}
					else{
						echo '<div class="notext">No items yet in the cart</div>';
					}
				?>
            </div>
			<?php
			if ($isthere){
				echo '<div class="total">Total: '.$total.'</div>
					<a class="confirm" href="/confirm.php?total='.$total.'">Order</a>
					<div class="marginbottom"></div>';
			}
			?>
        </div>
    </body>
</html>
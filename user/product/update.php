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
			.form{
				background-color: #DFEBF9;
				border: 1px #DFEBF9;
				border-radius: 10px;
				margin-top: 30px;
				width: 500px;
				height: 600px;
				box-shadow: 0 4px 10px 4px grey;
				padding: 10px;
			}
			.name{
				font-size: 18pt;
				font-weight: bold;
				margin: 5px;
				text-shadow: 0 0 2px black;
			}
			.item{
				font-size: 18pt;
				font-weight: bold;
				width: 400px;
				height: 20px;
				padding: 4px;
				margin: 5px;
			}
			.detail{
				font-family: Arial;
				font-size: 13pt;
				width: 400px;
				height: 300px;
				padding: 4px;
				vertical-align: up;
				margin: 5px;
			}
			.button{
				font-family: 'Righteous';
				font-size: 25pt;
				font-weight: bold;
				border-radius: 5px;
				border: 2px solid black;
				background-color: white;
				width: 300px;
				height: 50px;
				margin: 30px;
				transition: all 0.3s;
				text-shadow: 0 0 2px grey;
				box-shadow: 0 1px 5px 1px grey;
			}
			.button:hover{
				background-color: #878885;
				text-shadow: 0 0 3px black;
				color: white;
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
					$conn = pg_Connect("user=postgres password=rhkgkr6 dbname=mpharam");
					$query = "select * from products where id=".$_GET['id'].";";
					$result = pg_query($conn, $query);
					$row = pg_fetch_row($result);
					echo '<form action="change.php?id='.$row[4].'" method="post">
							<div class="form">
								<div class="name">ID: '.$row[4].' | NAME: '.$row[0].'</div>
								<input type="text" class="item" name="itemname" maxlength="20" placeholder="Item Name" value="'.$row[0].'"required></input><div>
								<textarea class="detail" name="detail" placeholder="Detail" maxlength="50" required>'.$row[1].'</textarea><div>
								<input type="text" class="item" name="quantity" placeholder="Quantity" value="'.$row[3].'" maxlength="4"onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></input>
								<input type="text" class="item" name="price" placeholder="Price" value="'.$row[5].'" maxlength="9"onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></input><div>
								<input type="submit" class="button" value="UPDATE"></input>
							</div>
						</form>
						';
				?>
            </div>
        </div>
    </body>
</html>
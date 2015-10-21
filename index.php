<html>
	<head>
		<meta charset="utf-8">
		<title>Тестовая страниц. Верстка</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<?
	require 'adm/config.php';
	$block1 = mysql_query("SELECT body FROM pages WHERE id = '1';", $link);
	$block2 = mysql_query("SELECT body FROM pages WHERE id = '2';", $link);
	$block3 = mysql_query("SELECT body FROM pages WHERE id = '3';", $link);
	$block4 = mysql_query("SELECT body FROM pages WHERE id = '4';", $link);
    $row1 = mysql_fetch_array($block1);
	$row2 = mysql_fetch_array($block2);
	$row3 = mysql_fetch_array($block3);
	$row4 = mysql_fetch_array($block4);

	require 'pictures/connect.php';
	$pic_block1 = mysql_query("SELECT file_name FROM pic_table WHERE id = '1';", $link);
	$pic_block2 = mysql_query("SELECT file_name FROM pic_table WHERE id = '2';", $link);
	$pic_block3 = mysql_query("SELECT file_name FROM pic_table WHERE id = '3';", $link);
	$pic_row1 = mysql_fetch_array($pic_block1);
	$pic_row2 = mysql_fetch_array($pic_block2);
	$pic_row3 = mysql_fetch_array($pic_block3);
	?>
	<body>
		<div class="content">
			<div class="header">
				<div class="title">
					<h1>Travel Agency</h1>
					<p class="top_description">Hello world!</p>
				</div>
				<div class="top_menu">
					<ul class="transform">
						<li>Home</li>
						<li>Book now</li>
						<li>rivals</li>
						<li>News</li>
						<li>Flighs</li>
						<li>Contacts</li>
						<a href="adm/admin.php"><li>Admin</li></a>
					</ul>
				</div>
				<div class="images">
					<div>
						<img class="round" width="125px" height="125px;" src="pictures/2.jpg">
						<img class="round" width="125px" height="125px;" src="pictures/3.jpg">
						<img class="round" width="125px" height="125px;" src="pictures/4.jpg">
					</div>
				</div>
				<div class="pic">
					<img width="100%" height="200px;" src="pictures/1.jpg">
				</div>
				<div class="bot_description">
					<h2 class="transform">Greek islands, Mainland Greece, Turkey and Egypt</h2>
					<p>with professional care and personal service</p>
				</div>
			</div>
			<div class="center">
				<div class="center_menu">
					<div class="center_menu_top">
						<ul>
							<li>Profile</li><hr>
							<li>Tickets</li><hr>
							<li>History</li><hr>
							<li>News</li><hr>
							<li>Tourist info</li><hr>
							<li>Links</li><hr>
							<li>Photos</li><hr>
							<li>Paynotes</li><hr>
							<li>Connect</li><hr>
							<li>Home</li>				
						</ul>
					</div>
					<div class="center_menu_bot">
						<p id="color1">Visit before</p><p class="transform" id="color2">Summer 2008 rates</p>
					</div>
				</div>
				<div class="main">
					<div class="row">
						<div class="text_block" id="first">
							<p><b class="transform">Welcome to <span class="textcolor_red">our website</span></b></p>
							<div class="text">
								<p><? echo $row1['body'] ?></p>
							</div>
						</div>
						<div class="text_block" id="second">
							<div class="text">
								<p><? echo $row2['body'] ?></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="text_block" id="third">
							<div class="caption"><p><b>Our Main Services</b></p></div>
							<div class="text">
								<p><? echo $row3['body'] ?></p>
							</div>
						</div>
						<div class="text_block" id="fourth">
							<div class="caption"><p><b>Reservations</b></p></div>
							<div class="text">
								<p><? echo $row4['body'] ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="after_text">
					<div class="new_images">
						<div class="square">
							<img class="round" width="160px" height="160px;" src="pictures/<? echo $pic_row1['file_name'] ?>">
							<span class="middle"><p>Andros</p></span>
						</div>
						<div class="square">
							<img class="round" width="160px" height="160px;" src="pictures/<? echo $pic_row2['file_name'] ?>">
							<span class="middle"><p>Nauplion</p></span>
							<p><span></span></p>
						</div>
						<div class="square">
							<img class="round" width="160px" height="160px;" src="pictures/<? echo $pic_row3['file_name'] ?>">
							<span class="middle"><p>Andros</p></span>
						</div>
					</div>
					<div class="banner">
						<div class="announce">
							<div class="ad">
								<div class="middle">
									<p class="transform">New offer</p>
									<h6><span>special offer 30%</span></h6>
								</div>
							</div>
							<div class="ad">
								<div class="middle">
									<p class="transform">Contact</p>
									<h6><span class="back">006-1234-2454 / 066-1234-4585</span></h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="bot_menu">
				<div class="list">
				<ul>
					<li>Home</li>
					<li>Destinations</li>
					<li>Packages</li>
					<li>Hotels</li>
					<li>Cruses</li>
					<li>Traverl Advisory</li>
					<li>Events</li>
					<li>Customize Your Package</li>
					<li>Profile</li>
				</ul>
				<ul>
					<li>Schedule</li>
					<li>History</li>
					<li>News</li>
					<li>Tourist Info</li>
					<li>Links</li>
					<li>FAQ's</li>
					<li>Paynotes</li>
					<li>Contact</li>
				</ul>
				</div>
				<div class="copyright">
					<p>Copyright © 2005 buytemplates.net. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</body>
</html>
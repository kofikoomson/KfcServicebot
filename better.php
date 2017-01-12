<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>KFCbot</title>
			<link rel="stylesheet" type="text/css" href="formValidators/vendor/bootstrap/css/bootstrap-theme.css"/>

		<link rel="stylesheet" type="text/css" href="formValidators/vendor/bootstrap/css/bootstrap.css"/>
			<script type="text/javascript" href="formValidators/vendor/bootstrap/js/bootstrap.js"></script>
			<script type="text/javascript" href="formValidators/vendor/jquery/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="api.css" type="text/css">
	</head>

		<body>
			<header>
				<nav id="nbar" class="navbar navbar-defaullt navbar-inverse navbar-fixed-top" role="navigation">
			
					<div class="container">
						<div class="navbar-header">
						
							<nav class="navbar navbar-inverse">
								<div class="container-fluid">
										<div class="navbar-header">
							  
										<a class="navbar-brand" href="#">KFCbot</a>
									</div>
								
									<ul class="nav navbar-nav">
										<li class="active"><a href="index.php"><span  class="glyphicon glyphicon-home">HOME PAGE </span></a></li>
										<li class="active"><a href="#"> <span class="glyphicon glyphicon-phone">CONTACT PAGE</span></a></li> 
											<li class="dropdown" >
												<a href="#" data-toggle="dropdown" class="dropdown-toggle"> <span  class="glyphicon glyphicon-user">ABOUT US</span></a>
								   
												<ul class="dropdown-menu" >
													<li > <a href="#">GALLERY</a> </li>
													<li > <a href="#">GALLERY</a> </li> 
												</ul> 
											</li> 
									</ul>
								</div>
							</nav>  
						</div>
					</div>
				</nav>
			</header>
			
			
						<div class="container" style="float:center;padding-top:200px;" >
							<div class="panel panel-success">
											<div class="panel-heading">
												<h3 class="panel-title">SEND MESSAGE TO THE BOT FOR RESPONSE</h3>
											</div>
								
									<div class="panel-body" id="load_tweets">

										<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
											<script type="text/javascript">
														var auto_refresh = setInterval(
															function ()
												{
													$('#load_tweets').load('record_count.php').fadeIn("slow");
													}, 10000); // refresh every 10000 milliseconds
											</script>
												
											<form method="post" action="#">
												<div class="form-group">
													<input class="form-control" name="message" type="text">
											  
													<button class="btn btn-success" name="SUBMIT" type="SUBMIT" ><span class="glyphicon glyphicon-envelope"></span>SEND</button>
												</div>
											  
											</form>
													  
									</div>
							</div>
						</div>
		</body>  

</html>
    


<?php
 //$page = $_SERVER['http://localhost/Distributed/project.php'];
//$sec = "2";
//accepting variables from the text box on our site
//this feature is also used for manually sending messages to the intended user 
//saving the bot token into the variable $botToken
$botToken = "251886091:AAFQMMW6m71p7gr9xEjWuP8-1iFFutvPIp8";
//instantiating the url for telegram
$website = "https://api.telegram.org/bot".$botToken;

	$update = file_get_contents($website."/getupdates");
	$update = json_decode($update, TRUE);
//last locator of an array
	$current_update =end($update["result"]);
//retrieves users chat id
	$chatId = $current_update["message"]["chat"]["id"]; 
//this receives input from the user and saves it as a variable
	$newmessage=$current_update["message"]["text"];
	$teleuser=$current_update["message"]["from"]["first_name"];

	//file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".$messageme); 
  
	//checking the text received from the user and giving it an associated message
	switch($newmessage) {
   
		
		case "Hello":
        $botMessage="Hi, Welcome to KFC Customer BOT, Please send your option
					1. I want to know the various KFC menu list
					2. Where Can I locate KFC restaurants
					3. What are the new KFC promotions";
		file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".$botMessage);
        break;
		
		case "How are you doing?":
        $botMessage="Fine thank you";
		file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".$botMessage);
        break;
        
		case "I need help":
        $botMessage="How can I help you please?";
		file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".$botMessage);
        break;
                
		case "1":
        $botMessage="KFC menu list 
					Jollof Rice at GHC 6.99
					Streetwise at GHC 11.99
					bucket(1 Piece) at GHC 6.49
					bucket(2 Piece) at GHC 11.99
					bucket(9 Piece) at GHC 52.99
					French fries(Regular) at GHC 5.99
					French fries(Large) at GHC 6.99";
		file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".$botMessage);
        break;

		case "2":
        $botMessage="Oxford Street,Osu,Accra
					NIA,Melcom Plus,Accra
					Community 18 Junction,Spintex
					1st Floor,Marina Mall,Airport
					Dansoman,Asoredanho(Mataheko)
					lagos Avenue,East Legon";
        file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".$botMessage);
        break;
		
		case "Thank you":
        $botMessage="You are always welcome";
		file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".$botMessage);
        break;
        
		case "3":
        $botMessage="10 Pieces of Chicken at GHC 60.00
					Fully Loaded Box Meal at GHC 31.99";
        file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".$botMessage);
        break;
		
		
       
    } 
	

?>



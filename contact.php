<?php

	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Contact Form'; 
		$to = 'megdollar@gmail.com'; 
		$subject = 'Message from Contact Page ';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}




?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Megan Dollar Designs</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  </head>
  <body>
<div id="wrap">

<nav class="navbar navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <i class="glyphicon glyphicon-menu-hamburger"></i>                      
      </button>
      <a class="navbar-brand" href="portfolio.html">Portfolio</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="resume.html">Resume</a></li>
        <li><a href="about.html">About</a></li>
        <li class="active"><a href="contact.html">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Megan Dollar</h1>      
    <p class="tagline">Front-end Web Developer</p>
  </div>
</div>

<div class="container-fluid bg-3 text-center" id="mainContent">
  <div class="row">
    <div class="col-sm-12">
      <h2 class="text-center">Contact Me</h2>
    </div>
  </div>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form class="form-horizontal" role="form" method="post" action="contact.php">

				<div class="form-group">
					<label for="name" class="col-sm-2">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php echo htmlspecialchards($_POST['name']); ?>">
						<?php echo "<p class='text-danger'>$errName</p>";?>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
						<?php echo "<p class='text-danger'>$errEmail</p>";?>
					</div>
				</div>

				<div class="form-group">
					<label for="message" class="col-sm-2 control-label">Message</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
						<?php echo "<p class='text-danger'>$errMessage</p>";?>

					</div>
				</div>

				<div class="form-group">
					<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
						<?php echo "<p class='text-danger'>$errHuman</p>";?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
					<?php echo $result; ?>	

					</div>
				</div>

			</form>
		</div>
	</div>
</div>







<footer class="container-fluid text-center">
      <div class="container">
        <div class="row">
            <div class="col-sm-6">
              <div class="pull-left">
                <p class="footerCopy">Copyright &copy;2017 by Megan Dollar</p>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="pull-right">
                    <a href="tel:4044094677"><i class="glyphicon glyphicon-earphone"></i>  Call Me  </a>
                    <a href="mailto:megdollar@gmail.com"><i class="glyphicon glyphicon-envelope"></i>  Email Me  </a>
                    <a href="https://www.linkedin.com/in/megan-dollar/"><i class="fa fa-linkedin"></i>  Let's Connect  </a>
                    <a href="https://github.com/megdollar"><i class="fa fa-github"></i>  Github  </a>
                </div>
            </div>
        </div>
    </div>
</footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
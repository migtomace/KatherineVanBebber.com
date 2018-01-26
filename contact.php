<?php
/**
 * simple.php is a postback application designed to provide a 
 * contact form for users to email our clients.  
 * 
 * simple.php provides a typical feedback form for a website
 *
 * @package nmCAPTCHA2
 * @author Bill & Sara Newman <williamnewman@gmail.com>
 * @version 1.01 2015/11/17
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see contact_include.php 
 * @see recaptchalib.php
 * @see util.js 
 * @todo none
 */

#EDIT THE FOLLOWING:
$toAddress = "katherinevanbebber@katherinevanbebber.com";  //place your/your client's email address here
$toName = "Katherine Van Bebber"; //place your client's name here
$website = "www.KatherineVanBebber.com";  //place NAME of your client's website here
#--------------END CONFIG AREA ------------------------#
$sendEmail = TRUE; //if true, will send an email, otherwise just show user data.
$dateFeedback = true; //if true will show date/time with reCAPTCHA error - style a div with class of dateFeedback
include_once 'includes/config.php'; #site keys go inside your config.php file
include 'includes/contact-lib/contact_include.php'; #complex unsightly code moved here
$response = null;
$reCaptcha = new ReCaptcha($secretKey);
if (isset($_POST["g-recaptcha-response"]))
{// if submitted check response
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($response != null && $response->success)
    {#reCAPTCHA agrees data is valid (PROCESS FORM & SEND EMAIL)
        handle_POST($skipFields,$sendEmail,$toName,$fromAddress,$toAddress,$website,$fromDomain);             #Here we can enter the data sent into a database in a later version of this file
    ?>
    <!-- START HTML FEEDBACK -->
    <div class="contact-feedback">
        <h2>Your Comments Have Been Received!</h2>
        <p>Thanks for the input!</p>
        <p>Katherine Van Bebber will respond via email within 48 hours, if you requested information.</p>
    </div>    
    <!-- END HTML FEEDBACK -->        
    <?php
}else{#show form, either for first time, or if data not valid per reCAPTCHA 
    if($response != null && !$response->success)
    {
        $feedback = dateFeedback($dateFeedback);
        send_POSTtoJS($skipFields); #function for sending POST data to JS array to reload form elements
    }//end failure feedback
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex,nofollow" />
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://use.fontawesome.com/6a71565c22.js"></script>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Mrs+Sheppards" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
</head>
<body>
    <nav>
        <ul class="topnav" id="myTopnav">
          <li><a href="index.html" class="selected">ABOUT</a></li>
          <li><a href="art.html">ART</a></li>
          <li><a href="video.html">VIDEO</a></li>
          <li><a href="gallery.html">GALLERY</a></li>
          <li><a href="booking.html">BOOKINGS</a></li>
          <li><a href="contact.php">CONTACT</a></li>
          <li class="icon"> <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a> </li>
        </ul>
    </nav>
    
    <div class="cover"><img src="images/guitar.png" class="coverimage" alt="Katherine Van Bebber playing the guitar"></div>
    <heading>Katherine Van Bebber</heading>
 <div class="contact">   
 <fieldset>
    <legend>Contact Katherine</legend>
	<form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
	<div>
		<label>
			Name:<br /><input type="text" name="Name" required="required" placeholder="Full Name (required)" title="Name is required" tabindex="10" size="44" autofocus />
		</label>
	</div>
	<div>	
		<label>
			Email:<br /><input type="email" name="Email" required="required" placeholder="Email (required)" title="A valid email is required" tabindex="20" size="44" />
		</label>
	</div>
	<!-- below change the HTML to your form elements - only 'Name' & 'Email' (above) are significant -->
	<div>	
		<label>
			Comments:<br /><textarea name="Comments" cols="36" rows="4" placeholder="Your comments are important to us!" tabindex="30"></textarea>
		</label>
	</div>	
	<div><?=$feedback?></div>
	<div class="g-recaptcha" data-sitekey="6Lca7UAUAAAAAHUG1AIm7SGUwAuowu97BDaAiKS4"></div>
	<div>
		<input type="submit" value="submit" />
	</div>
    </form>
</fieldset>
    </div>
	<!-- END HTML FORM -->
   
    <script src='https://www.google.com/recaptcha/api.js'></script>

<?php
}
?>
    
    <footer>
        
    </footer>
    <script>
        /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
    

</body>
</html>



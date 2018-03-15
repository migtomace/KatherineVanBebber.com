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


<?php include 'includes/top.php'?>


    <div class="cover"><img src="images/guitar.png" class="coverimage" alt="Katherine Van Bebber playing the guitar">
 <div class="contact">
   <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
 <fieldset>
    <legend align="center">Contact Katherine</legend>

	<div class="row">
		<label>Name:</label><br />
			<input type="text" name="Name" required="required" placeholder="Full Name (required)" title="Name is required" tabindex="10" size="44" autofocus />
	</div>
	<div class="row">
		<label>Email:<br /></label>
			<input type="email" name="Email" required="required" placeholder="Email (required)" title="A valid email is required" tabindex="20" size="44" />
	</div>
	<!-- below change the HTML to your form elements - only 'Name' & 'Email' (above) are significant -->
	<div class="row">
		<label>Comments:<br /></label><textarea name="Comments" cols="36" rows="4" placeholder="Please leave Katherine a comment..." tabindex="30"></textarea>
	</div>
	<div><?=$feedback?></div>
	<div align="center" class="g-recaptcha" data-sitekey="6Lca7UAUAAAAAHUG1AIm7SGUwAuowu97BDaAiKS4"></div>
	<div>
		<input type="submit" value="submit" />
	</div>

</fieldset>
</form>
    </div>
	<!-- END HTML FORM -->

    <script src='https://www.google.com/recaptcha/api.js'></script>

<?php
}
?>

<?php include 'includes/bottom.php'?>

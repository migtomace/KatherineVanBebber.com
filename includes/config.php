<?php
/**
 * config.php provides a place to store configuration info, 
 * such as your reCAPTCHA site keys
 *
 * @package nmCAPTCHA2
 * @see contact_include.php 
 * @see recaptchalib.php
 * @see util.js 
 * @todo none
 */

//Here are the keys for the server: katherinevanbebber.com
$siteKey = "6Lca7UAUAAAAAHUG1AIm7SGUwAuowu97BDaAiKS4";
$secretKey = "6Lca7UAUAAAAABANgrg67qnceebfqQXfFtL9Fc5q";


//echo basename($_SERVER['PHP_SELF']);
//die;

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//echo "constant: " . THIS_PAGE;
//die;

switch(THIS_PAGE)
{
    case 'index.php':
        $title = 'KVB Home';
        $home = 'selected';
    break;
        
    case 'music.php':
        $title = "KVB Music";
        $music = 'selected';
    break;
        
    case 'gallery.php':
        $title = "KVB Gallery";
        $gallery = 'selected';
    break;
        
    case 'art.php':
        $title = "KVB Art";
        $art = 'selected';
    break;
        
    case 'contact.php':
        $title = "KVB Contact Page";
        $contact = 'selected';
    break;
        
    case 'bookings.php':
        $title = "KVB Bookings";
        $bookings = 'selected';
    break;
        
    default:
        $title = THIS_PAGE;
}

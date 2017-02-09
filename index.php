<?php
//do you know how to set up your xampp vhosts file and your windows hosts file so that you can access this file in your browser via
//something like mortgage.dev?  If not, let me know and I'll help you set it up
//this code errors out for now. You'll need to fix some stuff in the class before it will work correctly
//just as a heads up the "<?php= $payment.." below is a shortcut for "<?php echo $payment ...."
//you can use it when you just want to echo the contents of your variable inside html code

//this is the start of the php code
include_once('Mortgage.php');

$myMortgage = new Mortgage(100000, 4.75, 360);
$payment = $myMortgage->calculatePayment();
// this is the end of the php code. The browser will output and render everything below the closin php tag as if it were html. unless you wrap id in new php tags, then it will be processed as php.
?>
<p>My mortgage payment is <?php= $payment ?></p>

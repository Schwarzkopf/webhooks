<?php
// Settings 
$from = "Klaus Schwarzkopf <info@example.com>";
$key = "uESliNRbADDl1F4d7BpMburKlpB30ihz";

/////////////////////////////////////////////////////////////////////////////

// Agains spam
if(!isset($_POST['key']) ||  $_POST['key'] != $key)
{
	echo '{ "air_variables": [ { "result": "false key" } ] }';
 	exit();
}

// Multiple recipients
if(isset($_POST['to']))
{
	$to = $_POST['to'];
}else{
 	echo '{ "air_variables": [ { "result": "no recipients" } ] }';
 	exit();
}

// Subject
if(isset($_POST['subject']))
{
	$subject = $_POST['subject'];
}else{
 	echo '{ "air_variables": [ { "result": "no subject" } ] }';
 	exit();
}


// Message
if(isset($_POST['message']))
{
	$message = $_POST['message'];
}else{
 	echo '{ "air_variables": [ { "result": "no message" } ] }';
 	exit();
}

// To send HTML mail, the Content-type header must be set

if(!isset($_POST['html']) || $_POST['html'] == "true")
{
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
}


// Additional headers
$headers[] = 'From: ' . $from;

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));

echo '{ "air_variables": [ { "result": "mail sent" } ] }';
?>

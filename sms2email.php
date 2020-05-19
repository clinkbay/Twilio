<?php
require_once("include/dbcommon.php");

header("Content-type: text/xml");
echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<Response></Response>"; 

$email = "th3korchi@gmail.com";
$subject = "Message from {$_REQUEST['From']} at {$_REQUEST['To']}"; 
$message = "You have received a message from {$_REQUEST['From']}. Body: {$_REQUEST['Body']}"; 

runner_mail(array('to' => $email, 'subject' => $subject, 'body' => $message));

// save in the database

$data = array();
$data["TextDateTime"] = now();
$data["TextNumberExternal"]  = $_REQUEST['From'];
$data["TextNumberInternal"]  = $_REQUEST['To'];
$data["TextMessage"] = $_REQUEST['Body'];
DB::Insert("text", $data );

?>
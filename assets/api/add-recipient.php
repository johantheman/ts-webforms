<?php
require 'credentials.php';
include 'api.php';

$fields = array(
	'client_id' => $key,
	'client_secret' => $secret,
	'refresh_token' => $refreshToken,
	'grant_type' => 'refresh_token'
);

$openTag = htmlentities('<Envelope><Body><AddRecipient><LIST_ID>',ENT_QUOTES, "UTF-8");
$bodyTag = htmlentities('</LIST_ID><CREATED_FROM>1</CREATED_FROM><UPDATE_IF_FOUND>true</UPDATE_IF_FOUND><COLUMN><NAME>EMAIL</NAME><VALUE>',ENT_QUOTES, "UTF-8");
$closeTag = htmlentities('</VALUE></COLUMN></AddRecipient></Body></Envelope>',ENT_QUOTES, "UTF-8");
function xml($open,$list_id,$body,$email,$close){

	$xml = $open . $list_id . $body . $email . $close;
	return $xml;
}

foreach($_POST['friends'] as $index => $value) {

	$xml_post = xml($openTag,'1234',$bodyTag,$value,$closeTag);
	$api = new  silverpopAPI();
	$api->post($host, $fields, $requesturl, $xml_post);

}








/**
$api = new  silverpopAPI();
$api->post($host, $fields, $requesturl, $xml_post)
**/
?>
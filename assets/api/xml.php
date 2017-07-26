<?php
/**
 * Created by PhpStorm.
 * User: Johan
 * Date: 7/26/2017
 * Time: 10:56 AM
 */

$openTag = htmlentities('<Envelope><Body><AddRecipient><LIST_ID>',ENT_QUOTES, "UTF-8");
$bodyTag = htmlentities('</LIST_ID><CREATED_FROM>1</CREATED_FROM><UPDATE_IF_FOUND>true</UPDATE_IF_FOUND><COLUMN><NAME>EMAIL</NAME><VALUE>',ENT_QUOTES, "UTF-8");
$closeTag = htmlentities('</VALUE></COLUMN></AddRecipient></Body></Envelope>',ENT_QUOTES, "UTF-8");
function xml($open,$list_id,$body,$email,$close){
	$xml = $open . $list_id . $body . $email . $close;
	return $xml;
}

echo xml($openTag,'1234',$bodyTag,'johan@vine.co.za',$closeTag);
<?php
class silverpopAPI {
	/*
	* Send a POST requst using cURL
	* @param string $host to request
	* @param string $requesturl to request
	* @param array $fields values to send
	* @param array $header values to send
	* @param string $xml_post handler for api call
	* @return string result
	*/
	function post($host, $fields, $requesturl, $xml_post) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $host);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
		$json_result = curl_exec($ch);
		$result = json_decode($json_result);
		$access_token = $result->access_token;
		$header = array(
			'Content-Type:text/xml;charset=UTF-8','Authorization: Bearer '.$access_token
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $requesturl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, count($xml_post));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post);
		$json_result = curl_exec($ch);
		//var_dump($json_result);
		curl_close($ch);
	}

}

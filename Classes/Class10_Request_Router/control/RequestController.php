<?php

include "model/Request.php";

class RequestController
{

	public function createRequest($protocol, $method, $uri, $server_addr)
	{
		$uri_array = explode("/", $uri);

		return new Request(
			    $protocol,
				$method,
				$uri_array[2],
				$this->getParams($uri_array[3]), 
				$server_addr);
		
	}	


	public function getParams($string_params)
	{
		$string_params = str_replace('?', '', $string_params);
		$tuples = explode('&', $string_params);
		$array = array();
		foreach ($tuples as $tuple) {
			$array_in = explode('=',$tuple);
			array_push($array, array($array_in[0] => $array_in[1]));
		}
		return $array;
	}






}

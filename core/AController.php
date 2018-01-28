<?php

include ('IController.php');
include ('Auth.php');

abstract class AController implements IController{

	private $data = '' ;
	private $request = [];

	function __construct(){		
		$this->{$_SERVER['REQUEST_METHOD']}();
	}
	function __destruct(){

	}
	function setData($data){
		$this->data = $data;
	}
	function setRequest($request){
		$this->request = $request;
	}
	function getRequest($index){
		return (isset($this->request[$index])?$this->request[$index]:null);
	}
	function returnData (){
		if (constant('self::'.'resultType')=='JSON')
		{
			header("Content-Type: application/json");
			echo json_encode($this->data);
		}
		else echo $this->data;
	}
	function GET($Auth = false){
		$this->setRequest($_GET);
		if ($Auth  && !(new Auth())->IsValid($this->getRequest('Username'), $this->getRequest('Password')))
			return;
	}
	function POST($Auth = false){
		$this->setRequest($_POST);
		if ($Auth  && !(new Auth())->IsValid($this->getRequest('Username'), $this->getRequest('Password')))
			return;
	}
	function DELETE($Auth = false){
		$raw_data = file_get_contents('php://input');
		$boundary = substr($raw_data, 0, strpos($raw_data, "\r\n"));
		$parts = array_slice(explode($boundary, $raw_data), 1);
		$_DELETE = array();
		foreach ($parts as $part) {
			if ($part == "--\r\n") break; 
			$part = ltrim($part, "\r\n");
			list($raw_headers, $body) = explode("\r\n\r\n", $part, 2);
			$raw_headers = explode("\r\n", $raw_headers);
			$headers = array();
			foreach ($raw_headers as $header) {
				list($name, $value) = explode(':', $header);
				$headers[strtolower($name)] = ltrim($value, ' '); 
			}
			if (isset($headers['content-disposition'])) {
				$filename = null;
				preg_match(
					'/^(.+); *name="([^"]+)"(; *filename="([^"]+)")?/', 
					$headers['content-disposition'], 
					$matches
				);
				list(, $type, $name) = $matches;
				isset($matches[4]) and $filename = $matches[4]; 
				switch ($name) {
					case 'userfile':
						file_put_contents($filename, $body);
						break;
					default: 
						$_DELETE[$name] = substr($body, 0, strlen($body) - 2);
						break;
				} 
			}

		}
		$this->setRequest($_DELETE);
		if ($Auth  && !(new Auth())->IsValid($this->getRequest('Username'), $this->getRequest('Password')))
			return;
	}
	function PUT($Auth = false){
		/*
		$put = array();
		parse_str(file_get_contents('php://input'), $put);
		*/
		/*
		$this->setRequest($_PUT);
		*/
		/*
		parse_str(file_get_contents("php://input"),$post_vars);
		echo $post_vars['fruit']." is the fruit\n";
		*/
		/*
		$putfp = fopen('php://input', 'r');
		$putdata = '';
		while($data = fread($putfp, 1024))
			$putdata .= $data;
		fclose($putfp);
		*/

		$raw_data = file_get_contents('php://input');
		$boundary = substr($raw_data, 0, strpos($raw_data, "\r\n"));
		$parts = array_slice(explode($boundary, $raw_data), 1);
		$_PUT = array();
		foreach ($parts as $part) {
			if ($part == "--\r\n") break; 
			$part = ltrim($part, "\r\n");
			list($raw_headers, $body) = explode("\r\n\r\n", $part, 2);
			$raw_headers = explode("\r\n", $raw_headers);
			$headers = array();
			foreach ($raw_headers as $header) {
				list($name, $value) = explode(':', $header);
				$headers[strtolower($name)] = ltrim($value, ' '); 
			}
			if (isset($headers['content-disposition'])) {
				$filename = null;
				preg_match(
					'/^(.+); *name="([^"]+)"(; *filename="([^"]+)")?/', 
					$headers['content-disposition'], 
					$matches
				);
				list(, $type, $name) = $matches;
				isset($matches[4]) and $filename = $matches[4]; 
				switch ($name) {
					case 'userfile':
						file_put_contents($filename, $body);
						break;
					default: 
						$_PUT[$name] = substr($body, 0, strlen($body) - 2);
						break;
				} 
			}

		}
		$this->setRequest($_PUT);
		if ($Auth  && !(new Auth())->IsValid($this->getRequest('Username'), $this->getRequest('Password')))
			return;
	}
}
?>
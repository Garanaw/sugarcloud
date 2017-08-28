<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_handler {

	protected $_messages = array(
		JSON_ERROR_NONE => 'No error has occurred',
		JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
		JSON_ERROR_STATE_MISMATCH => 'Invalid or malformed JSON',
		JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
		JSON_ERROR_SYNTAX => 'Syntax error',
		JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded',
		JSON_ERROR_RECURSION => 'Una o más referencias recursivas en el valor a codificar',
		JSON_ERROR_INF_OR_NAN => 'Uno o más valores NAN o INF en el valor a codificar',
		JSON_ERROR_UNSUPPORTED_TYPE => 'Se proporcionó un valor de un tipo que no se puede codificar'
	);
	protected $show_error = false;

	public function encode($value, $options = 0) {
		$result = json_encode($value, $options);

		if($result)  {
			return $result;
		}

		throw new RuntimeException($this->_messages[json_last_error()]);
	}

	public function decode($json, $assoc = false) {
		$result = json_decode($json, $assoc);

		if($result) {
			return $result;
		}

		throw new RuntimeException($this->_messages[json_last_error()]);
	}

	public function to_array($json){
		return $this->decode($json, true);
	}

	public function is_valid($json){
		// decode the JSON data
		$result = json_decode($json);

		if(JSON_ERROR_NONE === json_last_error()){
			return true;
		}
		if($this->show_error){
			throw new RuntimeException($this->_messages[json_last_error()]);
		}
		return false;
		
	}

	public function ajax_echo($echo, $options = 0){
		header('Content-Type: application/json');
		echo '['.$this->encode($echo, $options).']';
		return;
	}

}
?>
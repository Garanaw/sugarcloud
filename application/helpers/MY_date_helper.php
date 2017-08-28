<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function day_of_week($date = false){
	if(empty($date)){
		return 'Unknown';
	}

	return date('l', strtotime($date));

}

function number_day_of_week($date = false){
	if(empty($date)){
		return 'Unknown';
	}
	return date('w', strtotime($date));
}
  
function validate_date($date, $format = 'Y-m-d H:i:s'){
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
}

?>
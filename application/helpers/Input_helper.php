<?php
defined('BASEPATH') OR exit('No direct script access allowed');



function is_ajax(){
	return get_instance()->input->is_ajax_request();
}

?>
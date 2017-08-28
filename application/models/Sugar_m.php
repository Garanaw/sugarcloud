<?php

class Sugar_m extends MY_Model{


	public function __construct(){
		parent::__construct();
	}

	/**
	 * Saves a control into the database
	 */
	public function record_new_value($record = array()){
		if(empty($record)){
			return false;
		}
		$user_id = get_instance()->ion_auth->get_user_id();

		if(null === $user_id){
			return false;
		}

		$data = array(
			'id_user'=>$user_id,
			'messure' => (isset($record['messure'])) ? $record['messure'] : NULL,
			'value' => (isset($record['value'])) ? floatval(str_replace(',', '.', $record['value'])) : NULL,
			// reformat the date so it can be properly stored
			'date' => (isset($record['date'])) ? preg_replace('#(\d{2})/(\d{2})/\s(.*)#', '$3-$2-$1', $record['date']) : NULL,
			'time' => (isset($record['time'])) ? str_replace(' ', '', $record['time']) : NULL,
			'insulin1' => (isset($record['insulin1'])) ? $record['insulin1'] : NULL,
			'insulin1_units' => (isset($record['units1'])) ? $record['units1'] : NULL,
			'insulin2' => (isset($record['insulin2'])) ? $record['insulin2'] : NULL,
			'insulin2_units' => (isset($record['units2'])) ? $record['units2'] : NULL,
			'comment' => (isset($record['comment'])) ? $record['comment'] : NULL,
		);

		$this->db->insert('sugar_levels', $data);

		return $data;
	}

	public function get_week_controls($date = false, $messure = 'mmol'){

		$date = (false === $date) ? 'NOW()' : $date;

		$id_user = get_instance()->ion_auth->get_user_id();

		if(null === $id_user){
			return false;
		}

		// Select the whole week controls
		$query = 'SELECT id, date, time, value as title, insulin1, insulin1_units, insulin2, insulin2_units, comment
					FROM wi_sugar_levels
					WHERE id_user = '.$id_user.';';
					/*WHERE date BETWEEN DATE_ADD("'.$date.'", INTERVAL 1-DAYOFWEEK("'.$date.'") DAY)
					AND DATE_ADD("'.$date.'", INTERVAL 7-DAYOFWEEK("'.$date.'") DAY); ';*/

		$result = $this->db->query($query)->result_array();
		if(empty($result)){
			$result = array(
						array('time'=>'00:00', 'value'=>'0.0', 'date'=>date('Y-m-d'), 'comment'=>''), 
						array('time'=>'00:01', 'value'=>'0.0', 'date'=>date('Y-m-d'), 'comment'=>'')
			);
		}

		$result = $this->date_format($result);
		
		return $result;
	}

	public function date_format($arr){
		// format required for themeouette jquery plugin:
		// "D M d Y H:i eO"

		// let's try DATE_RSS
		foreach ($arr as $key => $value) {
			$timestamp = $value['date'].' '.$value['time'];
			$start = date_format(date_create($timestamp), DATE_RSS);
			//$end = date_format(date_modify(date_create($timestamp), '+1 hour'), DATE_RSS);
			$end = date_format(date_create($timestamp), DATE_RSS);
			$arr[$key]['start'] = $start;
			$arr[$key]['end'] = $end; //->modify('+1 hour');
			unset($arr[$key]['date']);
			unset($arr[$key]['time']);
		}
		return $arr;
	}

	public function get_day_controls($date){

		//$user = get_instance()->ion_auth->user()->row();

		if(null === $this->user->id){
			return false;
		}

		$query = 'SELECT messure, value, date, time, insulin1, insulin1_units, insulin2, insulin2_units, comment 
		FROM wi_sugar_levels 
		WHERE id_user = '.$this->user->id.' AND date LIKE "'.$date.'";';

		$result = $this->db->query($query)->result_array();

		// If no results, set default values
		if(empty($result)){
			$result = array(
						array('time'=>'00:00', 'value'=>'0.0', 'date'=>date('Y-m-d'), 'messure'=>'Mmol/l', 'comment'=>''), 
						array('time'=>'00:01', 'value'=>'0.0', 'date'=>date('Y-m-d'), 'messure'=>'Mmol/l', 'comment'=>'')
			);
		}

		//var_dump($result);
		$this->_filter_result($result);
		//die($this->user->messure);

		return $result;

	}

	public function get_month_avg($date){
		return $this->db->select('AVG(value) month_avg')->
						from('wi_sugar_levels')->
						where('MONTH(date)=MONTH("'.$date.'")')->get()->result_array()[0];
	}

	public function get_month_max($date){
		return $this->db->select('MAX(value) month_max')->
						from('wi_sugar_levels')->
						where('MONTH(date)=MONTH("'.$date.'")')->get()->result_array()[0];
	}

	public function get_month_min($date){
		return $this->db->select('MIN(value) month_min')->
						from('wi_sugar_levels')->
						where('MONTH(date)=MONTH("'.$date.'")')->get()->result_array()[0];
	}

	public function get_week_avg($date){
		return $this->db->select('AVG(value) week_avg')->
						from('wi_sugar_levels')->
						where('WEEK(date)=WEEK("'.$date.'")')->get()->result_array()[0];
	}

	public function get_week_max($date){
		return $this->db->select('MAX(value) week_max')->
						from('wi_sugar_levels')->
						where('WEEK(date)=WEEK("'.$date.'")')->get()->result_array()[0];
	}

	public function get_week_min($date){
		return $this->db->select('MIN(value) week_min')->
						from('wi_sugar_levels')->
						where('WEEK(date)=WEEK("'.$date.'")')->get()->result_array()[0];
	}

	/*
	 * Not in use...
	 */
	public function _filter_result(&$array){

		$messures = array(
			'mmol'=>array('MMOL', 'Mmol', 'mmol', 'Mmol/l', 'mmol/l'),
			'mg'=>array('MG', 'Mg', 'mg', 'Mg/dl', 'mg/dl')
		);

		//if($this->user->messure === 'Mmol/l'){
		if(in_array($this->user->messure, $messures['mmol'])){
			$this->result_to_mmol($array);
		//}elseif($this->user->messure === 'Mg/dl'){
		}elseif(in_array($this->user->messure, $messures['mg'])){
			$this->results_to_mg($array);
		}
	}

	public function results_to_mg(&$array){

		$needle = 'mmol/l';

		foreach ($array as $key => $value) {
			if(strpos($array[$key]['messure'], $needle) !== false){
				$array[$key]['value'] = $this->mmol_to_mg($array[$key]['value']);
				$array[$key]['messure'] = 'mg/dl';
			}
		}
	}

	public function result_to_mmol(&$array){

		$needle = 'mg/dl';

		foreach ($array as $key => $value) {
			if(strpos($array[$key]['messure'], $needle) !== false){
				$array[$key]['value'] = $this->mg_to_mmol($array[$key]['value']);
				$array[$key]['messure'] = 'mmol/l';
			}
		}
	}

	public function mmol_to_mg($mmol){
		return ($mmol * 18.016);
	}

	public function mg_to_mmol($mg){
		return (float)($mg / 0.0555);
	}

}


?>
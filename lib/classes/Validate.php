<?php

class Validate {

	private $_passed = false,
			$_errors = array(),
			$_db = null;

	public function __construct(){
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = array()){
		foreach($items as $item => $rules){

			if(isset($rules['label'])) {
				$label = $rules['label'];
			} else {
				$label = $item;
			}

			foreach($rules as $rule => $rule_value){
				$value = isset($source[$item]) ? $source[$item] : '';
				if($source != $_FILES) {
					if($rule === 'required' && empty($value)){
						$this->addError($item, "{$label} is required");
					}else if(!empty($value)){

						switch ($rule) {
							case 'min':
								if(strlen($value) < $rule_value){
									$this->addError($item, "{$label} must be a minimum of {$rule_value} characters.");
								}
								break;

							case 'max':
								if(strlen($value) > $rule_value){
									$this->addError($item, "{$label} must be a maximum of {$rule_value} characters.");
								}
								break;

							case 'matches':
								if($value != $source[$rule_value]){
									$labelValue = (isset($items[$rule_value]['label'])) ? $items[$rule_value]['label'] : $rule_value;
									$this->addError($item, "{$labelValue} must match {$label}");
								}
								break;

							case 'unique':
								$check = $this->_db->get($rule_value, array($item, '=', $value));
								if($check->count()){
									$this->addError($item, "{$label} already exists.");
								}
								break;

							case 'value_not':
								if($rule_value === $value){
									$this->addError($item, "Please select {$label}.");
								}
								break;

							case 'type':
								$count = 0;
								switch ($rule_value) {
									case 'int':
										if(!is_numeric($value)) {
											$count++;
										}
										break;
									case 'float':
										if(!is_numeric($value)) {
											$count++;
										}
										break;
								}
								if($count > 0){
									$this->addError($item, "{$label} is not in correct format.");
								}							
								break;
						}
					}
				} else {

					if($rule === 'required' && empty($_FILES[$item]['name'])) {
						$this->addError($item, "{$label} is required");
					}else {
						$file = $_FILES[$item];
						switch ($rule) {
							case 'size_max':
														
								$value = $this->getImageSize($rule_value);

								if($file['size'] > $value) {
									$this->addError($item, "{$label} should be less than $rule_value");
								}
								break;

							case 'size_min':

								$value = $this->getImageSize($rule_value);								
								$file['size'];
								if($file['size'] < $value) {
									$this->addError($item, "{$label} should be more than $rule_value");
								}
								break;
						}
					}
				}
			}
		}

		if(empty($this->_errors)){
			$this->_passed = true;
		}

		return $this;
	}

	private function getImageSize($size_string) {
		if(!is_numeric($size_string)) {
			$unit = substr(strrev($size_string), 0, 1);
			$value = substr($size_string, 0, strlen($size_string) - 1);
			switch ($unit) {
				case 'M':
					$div = 1024 * 2;
					break;

				case 'K':
					$div = 1024 * 1;
					break;
			}
		} else {
			$value = $size_string;
			$div = 1;
		}					
		/*Value in bytes if size specified in KB or MB*/
		return $value = $value * $div;		
	}

	private function addError($key, $error){
		$this->_errors[$key] = $error;
	}

	public function errors(){
		return $this->_errors;
	}

	public function passed(){
		return $this->_passed;
	}
}
<?php

class Action {

	public static function register() {

		if(Input::exists()){
			if(Token::check(Input::get('token'))){

				$validate = new Validate();
				$validate = $validate->check($_POST, array(
					'fullname' => array(
						'label' => 'Fullname',
						'required' => true,
						'min' => 2,
						'max' => 50
					),
					'username' => array(
						'label' => 'Username',
						'required' => true,
						'min' => 2,
						'max' => 20
					),
					'gender' => array(
						'label' => 'Gender',
						'required' => true
					),
					'marital_status' => array(
						'label' => 'Marital Status',
						'required' => true,
						'value_not' => 'select'
					),
					'age' => array(
						'label' => 'Age',
						'required' => true,
						'min' => 1,
						'type' => 'int'
					),
					'dob' => array(
						'label' => 'Date of Birth',
						'required' => true
					),
					'tob' => array(
						'label' => 'Time of Birth',
						'required' => true
					),
					'height' => array(
						'label' => 'Height',
						'required' => true,
						'type' => 'float'
					),
					'weight' => array(
						'label' => 'Weight',
						'required' => true,
						'min' => 1,
						'type' => 'int'
					),
					'edu' => array(
						'label' => 'Education',
						'required' => true,
						'min' => 1,
					),
					'occupation' => array(
						'label' => 'Occupation',
						'required' => true,
						'min' => 2,
					),
					'employed' => array(
						'label' => 'Employed In',
						'required' => true,
						'min' => 2,
					),
					'annual_income' => array(
						'label' => 'Personal Annual Income',
						'required' => true,
						'min' => 2,
					),
					'manglik' => array(
						'label' => 'Manglik Status',
						'required' => true,
						'min' => 2,
					),
					'password' => array(
						'label' => 'Password',
						'required' => true,
						'min' => 6
					),
					'password_again' => array(
						'label' => 'Password Again', 
						'required' => true,
						'matches' => 'password'
					)
				));

				$validate = $validate->check($_FILES, array(
					'image' => array(
						'label' => 'Image',
						'source' => 'file',
						'size_max' => '40K',
						'size_min' => '20K',
						'required' => true,
						'min' => 2
					)
				));

				if($validate->passed()){
					$user = new User();

					$salt = Hash::salt(32);
					
					try{
						
						$user_id = $user->create(array(
							'username' => Input::get('username'),
							'password' => Hash::make(Input::get('password'), $salt),
							'salt' => $salt,
							'name' => Input::get('name'),
							'joined' => date('Y-m-d H:i:s'),
							'group' => 1
						))->lastUserId();

						$user->create(array(
							'user_id' => $user_id,
							'fullname' => Input::get('fullname'),
							'gender' => Input::get('gender'),
							'marital_status' => Input::get('marital_status'),
							'age' => Input::get('age'),
							'dob' => Input::get('dob'),
							'tob' => Input::get('tob'),
							'height' => Input::get('height'),
							'weight' => Input::get('weight'),
							'education' => Input::get('edu'),
							'occupation' => Input::get('occupation'),
							'employed_in' => Input::get('employed'),
							'annual_income' => Input::get('annual_income'),
							'blood_group' => Input::get('blood_group'),
							'manglik' => Input::get('manglik')
						), 'profile_detail');
						
						Session::flash('home', 'You have been registered and now login!!');
						Redirect::to('home');

					} catch(Exception $e){
						die($e->getMessage());
					}
				}else{
					return $validate->errors();
					/*Function found in common-markup.php*/
					/*displayErrors($validate->errors(), 'validation');*/
				}
			}
		}
	}

}
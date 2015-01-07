<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function isValid($data){
		$rules = array(
			'nombre' => 'required',
			'apellido' => 'required',
			'email' => 'required|email|unique:usuarios',
			'password' => 'required|min:4|confirmed',
			'password_confirmation' => 'required|min:4',
			'perfil' => 'required'
		);

		$validator = Validator::make($data, $rules);

		if($validator->passes()){
			return true;
		}

		$this->errors = $validator->errors();

		return false;
	}
	
	public function isValidUpdate($data){
		$rules = array(
			'nombre' => 'required',
			'apellido' => 'required',
			'pass_Antigua' => 'required',
		);

		$validator = Validator::make($data, $rules);

		if($validator->passes()){
			return true;
		}

		$this->errors = $validator->errors();

		return false;
	}
}


?>
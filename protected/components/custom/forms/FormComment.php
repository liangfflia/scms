<?php

class FormComment extends CFormModel
{
	public $user;
	public $userId;
	public $text;
	public $verifyCode;

	public function rules()
	{
		return array(
			array('user, text, verifyCode', 'required', 'message'=>'Поле <b>{attribute}</b> не может быть пустым.'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'message'=>'Проверочный код введен неверно.'),
		);
	}
	
	
	public function attributeLabels()
	{
	    return array(
			'user' => 'Пользователь',
			'text' => 'Комментарий',
			'verifyCode'=>'Проверочный Код',
	    );
	}
	
	
//	public function 
	
}

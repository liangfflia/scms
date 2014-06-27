<?php

class SpamBehavior extends CActiveRecordBehavior
{
	
	public $lifeTime = 30;
	
	public function addSpamCheck()
	{
		$owner = $this->getOwner();
		$ownerClass = trim(get_class($owner));
		Yii::app()->session[$ownerClass] = new stdClass();
		Yii::app()->session[$ownerClass]->id = $owner->id;
		Yii::app()->session[$ownerClass]->added_time = time();
	}
	
	
	public function checkSpam()
	{
		if(isset(Yii::app()->user->role) && Yii::app()->user->role == 1)
			return true;
		
		$owner = $this->getOwner();
		$ownerClass = trim(get_class($owner));
		
		if(!isset(Yii::app()->session[$ownerClass]) || Yii::app()->session[$ownerClass] == null)
			return true;
		else if(Yii::app()->session[$ownerClass]->id != $owner->id)
			return true;
		if( (time() - Yii::app()->session[$ownerClass]->added_time) > $this->lifeTime)
		{
			unset(Yii::app()->session[$ownerClass]);
			return true;
		}
		else
			return false;
	}
	
	
}
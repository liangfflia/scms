<?php

class PasswordBehavior extends CActiveRecordBehavior
{
	public function beforeSave()
	{
		$owner = $this->getOwner();
		$field = $owner->passwordField;
		if($owner->hasAttribute($field))
		{
			if($owner->isNewRecord)
			{
			    $owner->$field = crypt($owner->$field, $owner->$field);
			}
			else
			{
			    $oldModel = $owner::model()->findByPk($owner->id);
			    if($oldModel->$field != $owner->$field)
				$owner->$field = crypt($owner->$field, $owner->$field);
			}
		}

		return true;
	}
	
}
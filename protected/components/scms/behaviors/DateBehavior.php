<?php

class DateBehavior extends CActiveRecordBehavior
{
	
	public function beforeSave()
	{
		$owner = $this->getOwner();
		if($owner->hasAttribute('dateAdded'))
		{
			if($owner->isNewRecord)
			{
				$owner->dateAdded = date('Y-m-d H:i:s');
			}
		}
		if($owner->hasAttribute('dateUpdated'))
		{
			if(!$owner->isNewRecord)
			{
				$owner->dateUpdated = date('Y-m-d H:i:s');
			}
		}
		return true;
	}
	
}
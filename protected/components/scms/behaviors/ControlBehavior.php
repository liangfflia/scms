<?php

class ControlBehavior extends CActiveRecordBehavior
{
	
	
	public function afterConstruct($event)
	{
		parent::afterConstruct($event);
		
		$owner = $this->getOwner();
		if($owner->hasAttribute('dateAdded') && $owner->hasAttribute('dateUpdated'))
		{
			$owner->attachBehavior('dateBehavior', array('class' => 'DateBehavior'));
		}
		
	}
	
}
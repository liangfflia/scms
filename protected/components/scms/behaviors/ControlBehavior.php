<?php

class ControlBehavior extends CActiveRecordBehavior
{
	
	
	public function afterConstruct($event)
	{
		parent::afterConstruct($event);
		
		$owner = $this->getOwner();
		if(!empty($owner->relations()))
			$owner->attachBehavior('cAdvancedArBehavior', array('class' => 'CAdvancedArBehavior'));
		if($owner->hasAttribute('dateAdded') && $owner->hasAttribute('dateUpdated'))
			$owner->attachBehavior('dateBehavior', array('class' => 'DateBehavior'));
		if($owner->hasAttribute('position'))
			$owner->attachBehavior('positionBehavior', array('class' => 'PositionBehavior'));
		if($owner->hasAttribute('ownerId') && $owner->hasAttribute('ownerClass'))
			$owner->attachBehavior('ownerBehavior', array('class' => 'OwnerBehavior'));
	}
	
}
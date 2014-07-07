<?php

class BaseModel extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	public function afterConstruct()
	{
		parent::afterConstruct();
		$rels = $this->relations();
		if(!empty($rels))
			$this->attachBehavior('cAdvancedArBehavior', array('class' => 'CAdvancedArBehavior'));
		if($this->hasAttribute('dateAdded') && $this->hasAttribute('dateUpdated'))
			$this->attachBehavior('dateBehavior', array('class' => 'DateBehavior'));
		if($this->hasAttribute('position'))
			$this->attachBehavior('positionBehavior', array('class' => 'PositionBehavior'));
		if($this->hasAttribute('ownerId') && $this->hasAttribute('ownerClass'))
			$this->attachBehavior('ownerBehavior', array('class' => 'OwnerBehavior'));
		
	}
	
}
<?php

class OwnerBehavior extends CActiveRecordBehavior
{
	
	public function beforeSave()
	{
		$owner = $this->getOwner();
		if($owner->hasAttribute('ownerId'))
		{
			if(Yii::app()->controller->_ownerId);
				$owner->ownerId = Yii::app()->controller->_ownerId;
		}
		if($owner->hasAttribute('ownerClass'))
		{
			if(Yii::app()->controller->_ownerClass)
				$owner->ownerClass = Yii::app()->controller->_ownerClass;
		}
		
		return true;
	}
	
	
	// Used for viewing admin list elements
	public function getOwnerGridList()
	{
		$owner = $this->getOwner();
		
		$result = array();

		foreach($owner::$owners as $key => $val)
		{
			array_push($result, array('id'=>$val, 'ownerClass'=>$key));
		}
		return $result;
	}
	
	
	public function getOwnerGridValue($value)
	{
		$owner = $this->getowner();
		
		foreach($owner::$owners as $key => $val)
		{
			if($val == $value)
			{
				echo $key;
				return false;
			}
		}
	}
	
	
	// Used for adding/updationg admin form element
	public function getOwnerFormList()
	{
		$owner = $this->getOwner();
		
		$result = array('0' => '');
		
		$owners = $owner::$owners;
		
//		for($i=0; $i<count($owners); $i++)
		foreach($owners as $k => $v)
		{
			$result[$v] = $k;
		}
		
		return $result;
	}
	
	
	public function getChields($ownerClass = '')
	{
		if($ownerClass == '')
		{
			$owner = $this->getOwner();
			if($owner->ownerId && $owner->id)
			{
				return $owner::model()->findAllByAttributes(array($owner->ownerId => $owner->id));
			}
		}
		return null;
	}
	
	
	public function getChieldsCount($id, $ownerId, $ownerClass = '')
	{
		if($ownerClass == '')
		{
			$owner = $this->getOwner();
			
			$count = $owner::model()->countByAttributes(array('ownerId' => $id));
			return ($count)?$count:'0';
		}
	}
	
	
}
<?php

class PositionBehavior extends CActiveRecordBehavior
{
	
	protected $_order = 'id';
	protected $_groupBy = 'id';
	
	public function beforeSave()
	{
		$owner = $this->getOwner();
		if($owner->hasAttribute('position'))
		{
			if($owner->isNewRecord)
			{
				$sql = "SELECT MAX(position) maxPos FROM `{$this->getOwner()->tableName()}`";
				$command = $a = Yii::app()->db->createCommand($sql);
				$maxPos = $command->queryScalar();		

				$owner->position = ++$maxPos;
			}
		}
		return true;
	}
	
	
	public function getPos($order = 't.id')
	{
		$criteria=new CDbCriteria;
		$criteria->select = 't.id, t.position';
		$criteria->order = $order;
		return $this->getOwner()->findAll($criteria);
	}
	
	
	public function getNextPos($pos)
	{
		$sql = "SELECT MIN(position) nextPos FROM `{$this->getOwner()->tableName()}` WHERE position > {$pos}";
		$command = $a = Yii::app()->db->createCommand($sql);
		$position = $command->queryScalar();
		
		return $position;
	}
	
	
	public function getPrevPos($pos)
	{
		$sql = "SELECT MAX(position) maxPos FROM `{$this->getOwner()->tableName()}` WHERE position < {$pos}";
		$command = $a = Yii::app()->db->createCommand($sql);
		$position = $command->queryScalar();
		
		return $position;
	}
	
}
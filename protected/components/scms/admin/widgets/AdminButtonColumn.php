<?php

Yii::import('zii.widgets.grid.CButtonColumn');

class AdminButtonColumn extends CButtonColumn
{
	public function __construct($grid)
	{
		if(Yii::app()->controller->_ownerId && Yii::app()->controller->_ownerClass)
			$this->updateButtonUrl = 'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey, "owner" => Yii::app()->controller->_ownerId, "owner_class" => Yii::app()->controller->_ownerClass))';
		elseif(Yii::app()->controller->_ownerId)
			$this->updateButtonUrl = 'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey, "owner" => Yii::app()->controller->_ownerId))';
		elseif(Yii::app()->controller->_ownerClass)
			$this->updateButtonUrl = 'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey, "owner_class" => Yii::app()->controller->_ownerClass))';
			
		$this->deleteButtonImageUrl = Yii::app()->baseUrl.'/res/img/icons/delete.png';
		$this->updateButtonImageUrl = Yii::app()->baseUrl.'/res/img/icons/update.png';
		$this->template = '{update} {delete}';
		parent::__construct($grid);
	}
}
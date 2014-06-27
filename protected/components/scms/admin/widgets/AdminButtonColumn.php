<?php

Yii::import('zii.widgets.grid.CButtonColumn');

class AdminButtonColumn extends CButtonColumn
{
	public function __construct($grid)
	{
		$this->deleteButtonImageUrl = Yii::app()->baseUrl.'/res/img/icons/delete.png';
		$this->updateButtonImageUrl = Yii::app()->baseUrl.'/res/img/icons/update.png';
		$this->template = '{update} {delete}';
		parent::__construct($grid);
	}
}
<?php

class SPager extends CLinkPager
{

	
	const CSS_FIRST_PAGE='first';
	const CSS_LAST_PAGE='last';
	const CSS_PREVIOUS_PAGE='previous';
	const CSS_NEXT_PAGE='next';
	const CSS_INTERNAL_PAGE='page';
	const CSS_HIDDEN_PAGE='hidden';
	const CSS_SELECTED_PAGE='active style-background';
	
	/**
	 * Initializes the pager by setting some default property values.
	 */
	public function init()
	{
		if($this->nextPageLabel===null)
			$this->nextPageLabel=Yii::t('yii','Далее &gt;');
		if($this->prevPageLabel===null)
			$this->prevPageLabel=Yii::t('yii','&lt; Предыдущая');
		if($this->firstPageLabel===null)
			$this->firstPageLabel=Yii::t('yii','&lt;&lt; Первая');
		if($this->lastPageLabel===null)
			$this->lastPageLabel=Yii::t('yii','Последняя &gt;&gt;');
		if($this->header===null)
			$this->header=Yii::t('yii','Страница: ');

		if(!isset($this->htmlOptions['id']))
			$this->htmlOptions['id']=$this->getId();
		if(!isset($this->htmlOptions['class']))
//			$this->htmlOptions['class']='yiiPager';
			$this->htmlOptions['class']='';
	}
	
}
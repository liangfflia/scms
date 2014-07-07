<?php

class Page extends BaseModel
{
	
	public 
		$subpage,
		$block,
		$part;
	
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{page}}';
	}

	public function rules()
	{
		return array(
			array('title, alias, text', 'required'),
			array('ownerId, isActive', 'numerical', 'integerOnly'=>true),
			array('title, metaDesc, annotation', 'length', 'max'=>255),
			array('alias', 'length', 'max'=>127),
			array('ownerClass', 'length', 'max'=>63),
			array('dateAdded, dateUpdated', 'safe'),
			array('id, title, alias, dateAdded, dateUpdated, metaDesc, ownerId, ownerClass, annotation, text, isActive', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'title' => Yii::t('app', 'Title'),
			'alias' => Yii::t('app', 'Alias'),
			'dateAdded' => Yii::t('app', 'Date Added'),
			'dateUpdated' => Yii::t('app', 'Date Updated'),
			'metaDesc' => Yii::t('app', 'Meta Desc'),
			'ownerId' => Yii::t('app', 'Owner'),
			'ownerClass' => Yii::t('app', 'Owner Class'),
			'annotation' => Yii::t('app', 'Annotation'),
			'text' => Yii::t('app', 'Text'),
			'isActive' => Yii::t('app', 'Is Active'),
			
			'subpage' => Yii::t('app', 'Подстраницы'),
		);
	}

	
	public function getOwnersCount()
	{
		return Page::model()->countByAttributes(array('ownerId'=>$this->id));
	}
	
	
	public function getBlocksCount()
	{
		return Block::model()->countByAttributes(array('ownerId'=>$this->id, 'ownerClass' => 'Page'));
	}

	public function getPartsCount()
	{
		return Part::model()->countByAttributes(array('ownerId'=>$this->id, 'ownerClass' => 'Page'));
	}
	
	
	public function getAdminOwnerLink()
	{
		echo '<a style="font-size: 18px;" href="/admin/page/index/owner/'.$this->id.'">[ '.$this->getOwnersCount().' ]</a>';
	}
	
	
	public function getAdminOwnerBlock()
	{
		echo '<a style="font-size: 18px;" href="/admin/blocks/index/owner/'.$this->id.'/owner_class/page">[ '.$this->getBlocksCount().' ]</a>';
	}
	
	
	public function getAdminOwnerPart()
	{
		echo '<a style="font-size: 18px;" href="/admin/parts/index/owner/'.$this->id.'/owner_class/page">[ '.$this->getPartsCount().' ]</a>';
	}
	
	
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('dateAdded',$this->dateAdded,true);
		$criteria->compare('dateUpdated',$this->dateUpdated,true);
		$criteria->compare('metaDesc',$this->metaDesc,true);
		$criteria->compare('ownerId',Yii::app()->controller->_ownerId);
		$criteria->compare('ownerClass',Yii::app()->controller->_ownerClass);
		$criteria->compare('annotation',$this->annotation,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('isActive',$this->isActive);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}

<?php

class Resource extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{resources}}';
	}

	public function rules()
	{
		return array(
			array('source', 'required'),
			array('ownerId, ownerClassId, isActive', 'numerical', 'integerOnly'=>true),
			array('source', 'length', 'max'=>500),
			array('dateAdded, dateUpdated', 'safe'),
			array('id, source, dateAdded, dateUpdated, ownerId, ownerClassId, isActive', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function behaviors()
	{
		return array(
			'CAdvancedArBehavior' => array(
				'class' => 'ext.CAdvancedArBehavior'
			),
			'dateBehavior' => array(
				'class' => 'DateBehavior',
			),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'source' => Yii::t('app', 'Source'),
			'dateAdded' => Yii::t('app', 'Date Added'),
			'dateUpdated' => Yii::t('app', 'Date Updated'),
			'ownerId' => Yii::t('app', 'Owner'),
			'ownerClassId' => Yii::t('app', 'Owner Class Id'),
			'isActive' => Yii::t('app', 'Is Active'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('source',$this->source);
		$criteria->compare('dateAdded',$this->dateAdded,true);
		$criteria->compare('dateUpdated',$this->dateUpdated,true);
		$criteria->compare('ownerId',$this->ownerId);
		$criteria->compare('ownerClassId',$this->ownerClassId,true);
		$criteria->compare('isActive',$this->isActive);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}

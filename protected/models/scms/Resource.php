<?php

class Resource extends BaseModel
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
//			array('source', 'required'),
			array('ownerId, isActive', 'numerical', 'integerOnly'=>true),
			array('source', 'file', 'allowEmpty' => true, 'types'=>'jpg, gif, png, bmp, doc, docx, pdf', 'on' => 'insert, update'),
//			array('source', 'length', 'max'=>500),
			array('dateAdded, dateUpdated', 'safe'),
			array('id, source, dateAdded, dateUpdated, ownerId, ownerClass, isActive', 'safe', 'on'=>'search'),
		);
	}

	public function behaviors()
	{
		return array(
            'resourceBehavior' => array(
                'class' => 'ResourceBehavior',
				'delFiles' => array('source'),
            ),
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
			'source' => Yii::t('app', 'Source'),
			'dateAdded' => Yii::t('app', 'Date Added'),
			'dateUpdated' => Yii::t('app', 'Date Updated'),
			'ownerId' => Yii::t('app', 'Owner'),
			'ownerClass' => Yii::t('app', 'Owner Class Id'),
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
		$criteria->compare('ownerId',Yii::app()->controller->_ownerId);
		$criteria->compare('ownerClass',Yii::app()->controller->_ownerClass,true);
		$criteria->compare('isActive',$this->isActive);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}

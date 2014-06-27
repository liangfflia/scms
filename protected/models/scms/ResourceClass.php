<?php

class ResourceClass extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{resource_classes}}';
	}

	public function rules()
	{
		return array(
			array('id, title', 'safe'),
			array('id, title', 'safe', 'on'=>'search'),
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
		);
	}

	public function attributeLabels()
	{
		return array(
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}

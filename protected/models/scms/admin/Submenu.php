<?php

class Submenu extends CActiveRecord
{
	
	protected
			$_order = 'position';
	
	
    public function behaviors(){
        return array(
            'positionBehavior' => array(
                'class' => 'PositionBehavior',
            ),
			'CAdvancedArBehavior' => array(
				'class' => 'ext.gtc.vendors.CAdvancedArBehavior'
			),
        );
    }
	
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{submenu}}';
	}

	public function rules()
	{
		return array(
			array('title, url, ownerId', 'required'),
			array('id, ownerId, isVisible, position', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>127),
			array('url', 'length', 'max'=>255),
			array('id, title, url, ownerId, isVisible, position', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'menu'=>array(self::BELONGS_TO, 'Menu', 'ownerId'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'title' => Yii::t('app', 'Title'),
			'url' => Yii::t('app', 'Url'),
			'ownerId' => Yii::t('app', 'Owner'),
			'isVisible' => Yii::t('app', 'Is Visible'),
			'position' => Yii::t('app', 'Position'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('url',$this->url,true);

		$criteria->compare('ownerId',$this->ownerId);

		$criteria->compare('isVisible',$this->isVisible);

		$criteria->compare('position',$this->position);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}

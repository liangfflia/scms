<?php

class Resource extends BaseModel
{
	
	protected 
		$_order = 'position';
	
	
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
		
		$criteria->order = $this->_order;
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	
	private function getImageResource($url)
	{
		if(file_exists($url))
		{
			$info = pathinfo($url);
			$extension = strtolower($info['extension']);
			
			$image = false;
			if($extension == 'jpg' || $extension == 'jpeg')
				$image = imagecreatefromjpeg($url);
			elseif($extension == 'png')
				$image = imagecreatefrompng($url);
			elseif($extension == 'gif')
				$image = imagecreatefromgif($url);
			elseif($extension == 'bmp')
				$image = imagecreatefromwbmp($url);
			return $image;
		}
		return false;
	}
	
	
	public function imageGet($url, $set)
	{
		$settings = require_once('protected/components/scms/config/resource.php');
		
		if(file_exists($url))
		{
			if (!is_dir('files/scms'))
				mkdir('files/scms', 0775);
			if (!is_dir('files/scms/'.$set))
				mkdir('files/scms/'.$set, 0775);
			
			$image = $this->getImageResource($url);
			$area = json_decode(json_encode($settings[$set]));

			$width = imagesx($image);
			$height = imagesy($image);
			
            $new_width = (isset($area->width) && $area->width) ? $area->width : null;
            $new_height = (isset($area->height) && $area->height) ? $area->height : null;
			
//			http://php.net/manual/en/function.imagecreatetruecolor.php
			
			$tmpImage = imagecreatetruecolor($new_width, $new_height);
			
			if($area->rule == 'resize')
				imagecopyresized($tmpImage, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			
			imagepng($tmpImage, "files/scms/$set/test.png");
		}
	}
	
}

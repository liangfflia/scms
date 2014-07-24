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
	
	
	public function hex2rgb($hex)
	{
		$rgb[0]=hexdec(substr($hex,1,2));
		$rgb[1]=hexdec(substr($hex,3,2));
		$rgb[2]=hexdec(substr($hex,5,2));
		
		return $rgb;
	}
	
	
	public function imageResize($url, $set)
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
			
			if( (isset($area->width) && $area->width) && (!isset($area->height) || !$area->height) )
			{
				$new_width = $area->width;
				$new_height = $height / ($width / $new_width);
			}
			elseif(( (!isset($area->width) || !$area->width) && (isset($area->height) && $area->height) ))
			{
				$new_height = $area->height;
				$new_width = $width / ($height / $new_height);
			}
			elseif( (isset($area->width) && $area->width) && (isset($area->height) && $area->height))
			{
				$new_width = (isset($area->width) && $area->width) ? $area->width : null;
				$new_height = (isset($area->height) && $area->height) ? $area->height : null;
			}
			else
				die('Please input "width" or "height" parameter in resource config section '.$set);
			
			$tmpImage = imagecreatetruecolor($new_width, $new_height);
			imagesavealpha($tmpImage, true);
			$trans_colour = imagecolorallocatealpha($tmpImage, 0, 0, 0, 127);
			imagefill($tmpImage, 0, 0, $trans_colour);
			
			if($area->rule == 'resize')
				imagecopyresized($tmpImage, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			elseif($area->rule == 'match')
			{
				if(!isset($area->position) || !in_array($area->position, array('left_top', 'center')))
					$area->position = 'left_top';
				
				if($area->position == 'left_top')
				{
					imagecopy($tmpImage, $image, 0, 0, 0, 0, $new_width, $new_height);
				}
				elseif($area->position == 'center')
				{
					$x = ($width / 2) - ($new_width / 2);
					$y = ($height / 2) - ($new_height / 2);
					imagecopy($tmpImage, $image, 0, 0, $x, $y, $new_width, $new_height);
				}
			}
			elseif($area->rule == 'inscribe')
			{
				if(!isset($area->x_border) && !$area->x_border)
					$area->x_border = 0;
				if(!isset($area->y_border) && !$area->y_border)
					$area->y_border = 0;
				$tmpImage = imagecreatetruecolor($new_width+($area->x_border * 2), $new_height+($area->y_border * 2));
				imagesavealpha($tmpImage, true);

				//background color
				if(!isset($area->background) || !$area->background)
					$area->background = '#FFFFFF';
				if($area->background == 'transparent')
					imagefill($tmpImage, 0, 0, $trans_colour);
				else
				{
					$rgb = $this->hex2rgb($area->background);
					$color = imagecolorallocate($tmpImage, $rgb[0], $rgb[1], $rgb[2]);
					imagefill($tmpImage, 0, 0, $color);
				}
				imagecopyresized($tmpImage, $image, $area->x_border, $area->y_border, 0, 0, $new_width, $new_height, $width, $height);
			}
			
			imagepng($tmpImage, "files/scms/$set/test.png");
		}
	}
	
	
	private function _inscribe($area)
	{
		
	}
	
	
}

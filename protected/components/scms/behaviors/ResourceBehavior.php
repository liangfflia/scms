<?php

class ResourceBehavior extends CActiveRecordBehavior
{
	public $delFiles = array();
	public $delImage;
	public $b_uploaders = array();
	public $b_sources;
	
	public function deleteResource($file)
	{
		if(file_exists(Yii::app()->request->getBaseUrl() . $file))
		{
			if(unlink(Yii::app()->request->getBaseUrl() . $file))
				return true;
			else
				return false;
		}
		return false;
	}
	
	
	public function beforeDelete($event)
	{
		parent::beforeDelete($event);
		if(!empty($this->delFiles))
		{
		    $owner = $this->getOwner();
		    foreach($this->delFiles as $val)
		    {
			if($owner->hasAttribute($val))
			{
			    $this->deleteResource($owner->$val);
			}
		    }
		}
		return true;
	}
	
	
	public function addImage( $field, $filePath, $width = null, $height = null, $thumbnail = false )
	{
		$owner = $this->getOwner();

		$uploader = new stdClass();
		$uploader->obj = CUploadedFile::getInstance($owner,$field);
		
		if($uploader->obj != null)
		{
			if(!is_dir($filePath))
				mkdir($filePath, 0775);
			
		    CUploadedFile::reset();
		    $uploader->field = $field;

		    $imgExt = '.'.$uploader->obj->getExtensionName();
		    $uploader->obj->setName(uniqid() . $imgExt);
		    $uploader->source = $filePath . $uploader->obj->getName();
		    $uploader->width = $width;
		    $uploader->height = $height;

		    if(!empty($thumbnail))
		    {
			if(!empty($owner->$thumbnail))
			{
			    $owner->deleteResource($owner->$thumbnail);
			}
			$owner->$thumbnail = $uploader->source;
		    }
		    else
		    {
			if(!empty($owner->$field))
			{
			    $owner->deleteResource($owner->$field);
			}
			$owner->$field = $uploader->source;
		    }

		    $this->b_uploaders[] = $uploader;
		}
		
	}
	
	
	public function saveImages()
	{
	    foreach($this->b_uploaders as $val)
	    {
		$val->obj->saveAs($val->source, false);
		if($val->width != null || $val->height != null)
		{
		    $image = Yii::app()->image->load($val->source);
		    $image->resize($val->width, $val->height);
		    $image->save();
		}
	    }
	}
		
	public function delResCheckbox($modelField, $formField)
	{
	    $owner = $this->getOwner();
	    $modelClassName = trim(get_class($owner));
	    if(isset($_POST[$modelClassName][$formField]) && $_POST[$modelClassName][$formField] == true)
	    {
		$owner->deleteResource($owner->$modelField);
		if($owner->hasAttribute($modelField))
		{
		    $owner->$modelField = null;
		}
	    }
	}
	
}
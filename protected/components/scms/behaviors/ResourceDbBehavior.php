<?php

class ResourceDbBehavior extends CActiveRecordBehavior
{
	public $field = null;
	
	
	public function afterSave()
	{
		$owner = $this->getOwner();
		
		$ownerClass = get_class($owner);
		$resource = ResourceClass::model()->findByAttributes(array('title'=>$ownerClass));
		if($resource == null)
		{
			$newRow = new ResourceClass;
			$newRow->title = $ownerClass;
			$newRow->save();
			$ownerClassId = $newRow->id;
		}
		else
			$ownerClassId = $resource->id;
		
		$field = $this->field;
		
		if(is_array($owner->$field))
		{
			foreach($owner->$field as $v)
			{
				
				$dir = Yii::getPathOfAlias('webroot').'/files/'.strtolower($ownerClass).'/'.$owner->id;
				$fileDir = 'files/'.strtolower($ownerClass).'/'.$owner->id;
				
				$resModel = new Resource;
				$resModel->ownerId = $owner->id;
				$resModel->ownerClassId = $ownerClassId;
				$resModel->source = $fileDir.'/'.$v->getName();
				$resModel->save();
				
				if(!is_dir($dir))
				{
				   mkdir($dir);
				   chmod($dir, 0755);
				}
				$v->saveAs($dir .'/'. $v->getName());
			}
		}
		
	}
	
	public function beforeDelete()
	{
		$owner = $this->getOwner();
		$ownerClass = get_class($owner);
		
		$resource = ResourceClass::model()->findByAttributes(array('title'=>$ownerClass));
		$ownerClassId = $resource->id;
		Resource::model()->deleteAllByAttributes(array('ownerClassId'=>$ownerClassId, 'ownerId'=>$owner->id));
		
		$dir = Yii::getPathOfAlias('webroot').'/files/'.strtolower($ownerClass).'/'.$owner->id;
		SFile::rmdir($dir);
	}
	
	
}
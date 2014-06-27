<?php

class DelDirsBehavior extends CActiveRecordBehavior
{
	public $folder = 'tmp';
	
	public function afterDelete($event)
	{
		$ds = DIRECTORY_SEPARATOR;
		$pathToDir = Yii::getPathOfAlias('webroot')  . $ds . 'images' . $ds .$this->folder . $ds . $this->getOwner()->id . $ds;
		
		SFile::rmdir($pathToDir);
	}
}
<?php
class PageController extends S_AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	protected $modelName = 'Page';
        

	public function actionIndex()
	{
		$model = new $this->modelName('search');
		
		$res = new Resource;
		$res->imageResize('files/Sale_Photo.png', 'slider');
		
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET[$this->modelName]))
			$model->attributes=$_GET[$this->modelName];
		
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
    
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        if(isset($_POST[$this->modelName]))
        {

			if($_POST[$this->modelName]['delImage'])
			{
				$model->deleteResource($model->thumb);
				$model->thumb = '';
			}
			$uploader = CUploadedFile::getInstance($model,'thumb');

			if($uploader != null)
			{
				$imgExt = '.'.$uploader->getExtensionName();
				$uploader->setName(uniqid() . $imgExt);
				$source = $model->folder . $uploader->getName();
				$model->deleteResource($model->thumb);
				$model->thumb = $source;
			}
			
			$model->attributes=$_POST[$this->modelName];
			
			if($uploader != null)
				$model->thumb = $source;
			elseif($model->thumb == '')
				unset($model->thumb);
			
			if($model->save())
			{
				if($uploader != null)
				{
					$uploader->saveAs($source);
					$image = Yii::app()->image->load($source);
					$image->resize($model->resizeWidth, null);
					$image->save();
				}
				
				$this->redirect(array('admin','id'=>$model->id));
			}
        }
        $this->render('update',array(
                'model' => $model,
        ));
    }
    
}

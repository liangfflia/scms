<?php

class ResourcesController extends S_AdminController
{
	
	public $modelName = 'Resource';
	public $modelAlias = 'resources';
	
	
	public function actionCreate()
	{
        $model=new $this->modelName;
		
        if(isset($_POST[$this->modelName]))
        {
            $model->attributes=$_POST[$this->modelName];
			
			if(empty($model->attributes->source))
				$model->source = $model->attributes['source'];
			
			$model->addImage('source', 'files/');
			
            if($model->save())
			{
				$model->saveImages();
                $this->redirect($this->_redirectUrl);
			}
        }

        $this->render('create',array(
            'model'=>$model,
        ));
	}
	
	
    public function actionUpdate($id)
    {
		$model = $this->loadModel($id);

		if (isset($_POST[$this->modelName]))
		{
			$model->delResCheckbox('source', 'delImage');
			
			$attrs = $model->attributes;
			$model->attributes = $_POST[$this->modelName];
			if (empty($model->attributes['source']))
				$model->source = $attrs['source'];
			$model->addImage('source', 'files/');
			
			if ($model->save())
			{
				$model->saveImages();
				$this->redirect($this->_redirectUrl);
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
    }
	
}
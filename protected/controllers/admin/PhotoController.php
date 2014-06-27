<?php

class PhotoController extends S_AdminController
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//	private $sliderSources = 'images/photos/';

    public $modelName = 'Photo';

    
    public function actionCreate()
    {
	$model = new $this->modelName;

	if (isset($_POST[$this->modelName]))
	{
	    $model->attributes = $_POST[$this->modelName];

	    $model->addImage('src', 'files/photos/');
	    $model->addImage('src', 'files/photos/thumbs/', null, 127, 'thumb');

	    if ($model->save())
	    {
		$model->saveImages();
		$this->redirect(array('admin'));
	    }
	}

	$this->render('create', array(
	    'model' => $model,
	));
    }

    public function actionUpdate($id)
    {
	$model = $this->loadModel($id);

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if (isset($_POST[$this->modelName]))
	{
	    $model->delResCheckbox('src', 'delImage');
	    $model->delResCheckbox('thumb', 'delImage');
	    
	    $attrs = $model->attributes;

	    $model->attributes = $_POST[$this->modelName];

	    if(empty($model->attributes->src))
		$model->src = $attrs['src'];
	    
	    $model->addImage('src', 'files/photos/');
	    $model->addImage('src', 'files/photos/thumbs/', null, 50, 'thumb');

	    if ($model->save())
	    {
		$model->saveImages();
		$this->redirect(array('admin'));
	    }
	}

	$this->render('update', array(
	    'model' => $model,
	));
    }

    
    public function actionIndex()
    {
	$model = new $this->modelName('search');
	$model->unsetAttributes();  // clear any default values
	if (isset($_GET[$this->modelName]))
	    $model->attributes = $_GET[$this->modelName];

	$this->render('admin', array(
	    'model' => $model,
	));
    }

}

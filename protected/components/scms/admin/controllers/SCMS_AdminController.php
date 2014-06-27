<?php

class SCMS_AdminController extends Controller
{

	public 
		$layout='/admin/admin/layouts/main',
		$modelAlias = null,
		$delUrl,
		$upUrl,
		$downUrl,
		$_ownerId,
		$_ownerClass;
	
	
	protected 
		$modelName = null,
		$formAjaxAlias = null,
		$uploadFolder = 'tmp',
			
		$_redirectUrl,
		$_ownersBreadcrumbs = array();
	

	public function __construct($id, $module = null)
	{
		parent::__construct($id, $module);
		
		if($this->modelName == null)
		{
			die('The property $modelName must have defined value.');
		}
		if($this->modelAlias == null)
		{
			$this->modelAlias = $this->getAliasName($this->modelName);
		}
		if($this->formAjaxAlias == null)
		{
			$this->formAjaxAlias = $this->getAliasName($this->modelName) . '-form';
		}
                
		$this->upUrl = CController::createUrl('ajaxmoveup');
		$this->downUrl = CController::createUrl('ajaxmovedown');
		$this->delUrl = CController::createUrl('ajaxdelete');
	}
	
	
	protected function beforeAction($action)
	{
		$this->_ownerId = Yii::app()->request->getParam('owner') ? Yii::app()->request->getParam('owner') : 0;
		$this->_ownerClass = Yii::app()->request->getParam('owner_class') ? Yii::app()->request->getParam('owner_class') : NULL;
		$this->_redirectUrl = '/admin/'.str_replace('controller','', strtolower(get_class($this)));
		if($this->_ownerId)
			$this->_redirectUrl .= '/index/owner/'.$this->_ownerId;
		if($this->_ownerClass)
			$this->_redirectUrl .= '/owner_class/'.$this->_ownerClass;
//		
		return true;
	}
	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
    public function actionCreate()
    {
        $model=new $this->modelName;
		
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST[$this->modelName]))
        {
            $model->attributes=$_POST[$this->modelName];
			
			if($model->hasAttribute('ownerId') && !empty($this->_ownerId))
			{
				$model->ownerId = $this->_ownerId;
			}
			
            if($model->save())
                $this->redirect($this->_redirectUrl);
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST[$this->modelName]))
		{
			$model->attributes=$_POST[$this->modelName];
			if($model->save())
				$this->redirect($this->_redirectUrl);
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new $this->modelName('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET[$this->modelName]))
			$model->attributes=$_GET[$this->modelName];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionSettings()
	{
		$settings = new Settings();
		$settings = $settings->findAllByAttributes(array(
			'group' => $this->modelAlias
		));
		
		
		// retrieve items to be updated in a batch mode
		// assuming each item is of model class 'Item'
		if(isset($_POST['Settings']))
		{
			$valid=true;
			foreach($settings as $i=>$item)
			{
				if(isset($_POST['Settings'][$i]))
					$item->attributes=$_POST['Settings'][$i];
				$item->save();
				$valid=$item->validate() && $valid;
			}
			if($valid)  // all items are valid
			{
				Yii::app()->user->setFlash('success', "Данные сохранены успешно!");
			}
		}
		
		$this->render('/admin/admin/settings',array(
			'model'=>$settings,
		));
	}
	
	
	public function actionAjaxDelete()
	{
		$model=new $this->modelName('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET[$this->modelName]))
			$model->attributes=$_GET[$this->modelName];
		
		if(isset($_POST['checked']))
		{
			if (Yii::app()->request->isAjaxRequest)
			{
				$checked = $_POST['checked'];
				foreach($checked as $id)
				{
					$this->loadModel($id)->delete();
				}
				$this->renderPartial('_grid', array('model'=>$model), false, true);
				Yii::app()->end();
			}
		}
		else
		{
			$this->render('admin',array(
				'model'=>$model,
			));
		}
	}
	
	
	public function actionAjaxMoveUp()
	{
		$model=new $this->modelName('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET[$this->modelName]))
			$model->attributes=$_GET[$this->modelName];
		if(isset($_POST['checked']))
		{
			$modelRow = new $this->modelName();
			
			if (Yii::app()->request->isAjaxRequest)
			{
				$checked = $_POST['checked'];

				foreach($checked as $id)
				{
					$modelCurr = $modelRow->findByPk($id);

					$currPos = $modelCurr->position;
					$nextPos = $modelRow->getPrevPos($currPos);
					if($nextPos != 0)
					{
						$modelNext = $modelRow->findByAttributes(array('position' => $nextPos));

						$modelCurr->position = $nextPos;
						$modelCurr->update();

						$modelNext->position = $currPos;
						$modelNext->update();
					}
				}
				$this->renderPartial('_grid', array('model'=>$model), false, true);
				Yii::app()->end();
			}
		}
		else
		{
			$this->render('admin',array(
				'model'=>$model,
			));
		}
	}

	
	public function actionAjaxMoveDown()
	{
		$model=new $this->modelName('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET[$this->modelName]))
			$model->attributes=$_GET[$this->modelName];
		
		if(isset($_POST['checked']))
		{
			$modelRow = new $this->modelName();
				
			if (Yii::app()->request->isAjaxRequest)
			{
				$checked = $_POST['checked'];
				rsort($checked);
				foreach($checked as $id)
				{
					$modelCurr = $modelRow->findByPk($id);

					$currPos = $modelCurr->position;
//					$nextPos = $modelRow->getNextPos($currPos);
					$nextPos = $modelRow::model()->getNextPos($currPos);
					if($nextPos != 0)
					{
						$modelNext = $modelRow->findByAttributes(array('position' => $nextPos));

						$modelCurr->position = $nextPos;
						$modelCurr->update();

						$modelNext->position = $currPos;
						$modelNext->update();
					}
				}
				$this->renderPartial('_grid', array('model'=>$model), false, true);
				Yii::app()->end();
			}
		}
		else
		{
			$this->render('admin',array(
				'model'=>$model,
			));
		}
	}
	
	/*
	 * Uploads image to $this->uploadFolder
	 */
	public function actionUpload()
	{
		$ds = DIRECTORY_SEPARATOR;
		Yii::import('application.extensions.upload.Upload');
		// receive file from post
		$Upload = new Upload((isset($_FILES['file']) ? $_FILES['file'] : null));
		
		if ($Upload->file_is_image === true)
		{
			if(!isset(Yii::app()->session[$this->uploadFolder.'UploadId']))
			{
				$uniqid = uniqid();
				Yii::app()->session[$this->uploadFolder.'UploadId'] = $uniqid;
			} else {
				$uniqid = Yii::app()->session[$this->uploadFolder.'UploadId'];
			}
			
			$dir = Yii::app()->basePath . $ds . '..' . $ds . 'files' . $ds . $this->uploadFolder . $ds . $uniqid . $ds;
			$fileName = uniqid();
			if ($Upload->uploaded)
			{
				$Upload->file_new_name_body = $fileName;
				$Upload->process($dir);
				if ($Upload->processed)
				{
					$link = Yii::app()->baseUrl . '/files/'.$this->uploadFolder.'/' . $uniqid . '/' . $Upload->file_dst_name;
					$response = array('filelink' => $link);
					$this->_changeUploadedImagesFile($dir, $link);
					echo stripslashes(json_encode($response));
				}
			}
		} else {
			echo "it's not image";
		}
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Slider the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$modelName = $this->modelName;
		$model=$modelName::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Slider $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']===$this->formAjaxAlias)
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	private function getDays( $model, $field = 'dateAdded' )
	{
		$days = 0;
		$table = $model::model()->tableName();
		$sql = "SELECT MAX(`{$field}`) maxDate FROM `{$table}`";
		$command = $a = Yii::app()->db->createCommand($sql);
		$lastDate = $command->queryScalar();
		if($lastDate)
			$days = SDate::span(strtotime($lastDate), time(), 'days');
		return $days;
	}
	      
//         public function actionValidate()
//         {   
//             $users = new User; 
//             if(isset($_POST['User']['login']))
//             { 
////                 $username = $_POST['User']['username'];
////                 $password = $_POST['User']['password'];
//                 $username = $_POST['User']['login'];
//                 $password = $_POST['User']['pass'];
//                 $identity=new UserIdentity($username, $password);
//                 if($identity->authenticate())
//		 { 
//                    Yii::app()->user->login($identity);
////		    $this->redirect(Yii::app()->baseUrl . '/admin');
//		    $this->redirect(Yii::app()->user->returnUrl);
//                 }
//                 else {
//                 //echo $identity->errorMessage . 'типо ошибки';
//                 $this->render('/default/login', array('error' => 'Wrong data'), false, true);
//                 }           
//             } else {
//                 $this->render('/default/login', array(), false, true);      
//             }
//         }
         
	
		protected function _ownersBreadcrumbs($ownerId)
		{
			$model = $this->modelName;
			$owner = $model::model()->findByAttributes(array('id'=>$ownerId));
			if($owner)
			{
				$alias = 'page';
				if(Yii::app()->controller->id == 'admin/blocks')
					$alias = 'blocks';
				if(Yii::app()->controller->id == 'admin/page')
					$alias = 'page';
				
				if($this->_ownerClass!= 'page')
				{
						$page = Page::model()->findByAttributes(array('id'=>$this->_ownerId));
						Yii::app()->session['ownerPageId'] = $page->id;
						Yii::app()->session['ownerPageName'] = $page->title; echo $page->title;
				}
				
				$href2 = false;
				$href = '<a href="/admin/'.$alias.'/index/owner/'.$owner->id.'">'.$owner->title.'</a>';
				if($owner->ownerId == 0)
					$href2 = '<a href="/admin/'.$alias.'/index">Страницы</a>';
				$this->_ownersBreadcrumbs[] = $href;
				if($href2)
					$this->_ownersBreadcrumbs[] = $href2;
				$ownerId = $owner->ownerId;
				$this->_ownersBreadcrumbs($ownerId);
			}
			else
			{
				if($this->_ownerClass == 'page')
				{
//						$page = Page::model()->findByAttributes(array('id'=>$this->_ownerId));
//						Yii::app()->session['ownerPageId'] = $page->id;
//						Yii::app()->session['ownerPageName'] = $page->title;
				}
				
				if(Yii::app()->controller->id == 'admin/blocks')
				{
					$this->_ownersBreadcrumbs[] = '<a href="/admin/blocks/index/owner/1/owner_class/page">Блоки</a>';
					$this->_ownersBreadcrumbs[] = '<a href="/admin/page/index/owner/'.Yii::app()->session['ownerPageId'].'">'.Yii::app()->session['ownerPageName'].'</a>';
				}
				
				$this->_ownersBreadcrumbs = array_reverse($this->_ownersBreadcrumbs);
				$html = implode(' / ', $this->_ownersBreadcrumbs);
				$this->_ownersBreadcrumbs = $html;
			}
		}
	
		
		public function getOwnBreadcrumbs()
		{
			$this->_ownersBreadcrumbs($this->_ownerId);
			return $this->_ownersBreadcrumbs;
		}
		
		 
		 public function actionLogout()
		 {
			 Yii::app()->user->logout();
			 $this->redirect('/admin');
		 }
		 
		 
//         public function filters()
//        {
//            return array(
//                'accessControl',
//            );
//        }
    
//        public function accessRules()
//    {
//        return array(
//            array('allow',
//				//1 - admin
//                'roles'=>array('1'),
//            ),
//             array('allow',
//                'actions'=>array('validate'),
//                'roles'=>array('guest'),
//            ),
//            array('deny',
//                'roles'=>array('guest'),
//            ),
//           
//        );
//    }
        
        
}
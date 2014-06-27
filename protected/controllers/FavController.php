<?php

class FavController extends S_FrontController
{
	
	
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				'foreColor'=>0x3E4753,
			),
		);
	}
    
    
	public function actionIndex()
	{
		
		$fields = array();
		$favModels = Fav::model()->findAll(array('order'=>'position'));
		if(!empty($favModels))
		{
			$i = 0;
			foreach($favModels as $val)
			{
				$fields[$i]->stdField = $val->stdField;
				$fields[$i]->title = $val->title;
				$fields[$i]->alias = $val->alias;
				$i++;
			}
		}
		$fav = new stdClass();
		$fav->news = $this->getFav('favNews', 'news');
		$fav->photos = $this->getFav('favPhotos', 'photos');
		$fav->articles = $this->getFav('favArticles', 'articles');
		$fav->videos = $this->getFav('favArticles', 'videos');
		
		$this->render('index', array(
			'content'=>'',
			'fav'=>$fav,
			'fields'=>$fields
		));
	}

	
	public function actionNews()
	{
		$favCond = '(-1)';
		$favedIds = array();
		if(isset(Yii::app()->session['favNews']) && !empty(Yii::app()->session['favNews']))
		{
			foreach(Yii::app()->session['favNews'] as $val)
			{
				$favedIds[] = $val['id'];
			}
		}
		
		if(!empty($favedIds))
		{
			$favCond = '(' . implode(',', $favedIds) . ')';
		}

		$news = News::model()->findAll("id IN {$favCond}");
		
		$this->render('news', array(
			'news' => $news,
			'currentPage' => SPagination::getCurrentPage(),
			'pages' => SPagination::getPages('News', "id IN {$favCond}")
		));
		
	}
	
	

	public function actionNewsOne( $id )
	{
		$flag = false;
		
		$new = News::model()->findByPk($id);
		
		if($new != null)
		{
			$flag = true;
			$formCommentModel = new FormComment;
			if(isset($_POST['ajax']) && $_POST['ajax']==='comments-form')
			{
				echo CActiveForm::validate($formCommentModel);
				Yii::app()->end();
			}

			if(isset($_POST['FormComment']))
			{
				$formCommentModel->attributes = $_POST['FormComment'];
				if($formCommentModel->validate())
				{
					$new->addComment($formCommentModel->text, $formCommentModel->user);
					$new->addSpamCheck();
				}
			}

			$comments = $new->getComments();

			$this->render('//news/one', array(
			    'data' => $new,
			    'commentForm' => $formCommentModel,
			    'comments' => $comments,
			    'isFav' => true
			));
		}
			
		if($flag == false)
			$this->defaultError();
	}
	
	

	private function getFav($sessField, $stdField)
	{
//		$fav = new stdClass();
		$stdField = new stdClass();
		$stdField->count = 0;
		$stdField->date = '-';
		if(isset(Yii::app()->session[$sessField]) && !empty(Yii::app()->session[$sessField]))
		{
			
			$favData = Yii::app()->session[$sessField];
			
			$dates = array();
			
			foreach($favData as $val)
			{
				$dates[] = $val['dateAdded'];
			}
			
			$stdField->count = count($favData);
			$stdField->date = date('d/m/Y H:i', max($dates));
		}
		return $stdField;
	}
	

}

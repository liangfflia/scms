<?php

class NewsController extends S_FrontController
{
	
	private $_lastNews;
	
	
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
	
	
	protected function beforeAction()
	{
		parent::beforeAction();
		$this->_lastNews = SPagination::getRows('News', null, 5);
		return true;
	}
	
	
	public function actionIndex()
	{
	    
		$offset = News::model()->getOffset();
		$limit = News::model()->getLimit();
		
		$sort = Yii::app()->request->getParam('sort');
		$search = Yii::app()->request->getPost('searchtext');

		if($sort && $sort == 'rating')
		{
			$sqlOffset = empty($offset)?'0':$offset;
			
			$sqlSearch = '';
			if(!empty($search))
				$sqlSearch = "AND (title LIKE '%{$search}%' OR description LIKE '%{$search}%')";
			
			$news = News::model()->findAllBySql(
					"SELECT 
					    id, title, annotation, thumb, description, isActive, dateAdded, dateUpdated, positive, negative,
					    ((positive + 1.9208) / (positive + negative) -
					        1.96 * SQRT((positive * negative) / (positive + negative) + 0.9604) /
					 		(positive + negative)) / (1 + 3.8416 / (positive + negative))
						AS ci_lower_bound
					    FROM tbl_news
						WHERE positive + negative > 0
						AND isActive='1'
						".$sqlSearch."
					    ORDER BY ci_lower_bound DESC
						LIMIT {$limit} OFFSET {$sqlOffset};"
					);
		}
		elseif($sort && $sort == 'name')
		{
			$news = News::model()->getRows($offset, null, array('isActive'=>1), 'title ASC');
		}
		else
			$news = News::model()->getRows($offset, null, array('isActive'=>1));
		
//		if(News::model()->count() > 0 && empty($news))
//		{
//			$this->redirect('/news');
//		}
		
		$favedIds = array();
		$fav = Session::initArr('favNews', true);
		$rateSess = Session::initArr('ratedNews', true);
		foreach($news as $key => $val)
		{
			foreach($fav as $val2)
			{
				if($val->id == $val2['id'])
				{
					$favedIds[] = $val->id;
				}
			}

			foreach($rateSess as $val3)
			{
				if($val->id == $val3['itemId'])
				{
					$news[$key]->dislike = $val3['dislike'];
				}
			}
		}

		$paginator = new CPagination(News::model()->getActiveCount());
		$paginator->pageSize = News::model()->limit;
		
		$this->render('index', array(
			'news' => $news,
			'lastNews' => $this->_lastNews,
			'currentPage' => News::model()->getCurrentPage(),
			'pages' => News::model()->getPages(),
			'favedIds' => $favedIds,
			'paginator' => $paginator,
			'sort' => $sort,
			'search' => $search
		));
	}
	
	
	public function actionAjaxDelComment($id)
	{
	    if(!empty($id))
		Comments::model()->deleteAllByAttributes(array('id'=>$id));
	}
	
	
	public function actionOne($id, $title)
	{
		$flag = false;
		
		$new = News::model()->findByPk($id);
		
		if($new != null && $new->title == $title)
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

			$this->render('one', array('data' => $new, 'commentForm' => $formCommentModel, 'comments' => $comments, 'lastNews' => $this->_lastNews));
		}
			
		if($flag == false)
			$this->defaultError();
	}

	
}

<?php

class PhotoController extends S_FrontController
{
	
	
	public function actionIndex( $category = null )
	{
//		echo CVarDumper::dump(Yii::app()->session['favPhotos'],10,true);exit;
		
		$cat = new stdClass();
		$cat->id = null;
		$cat->title = null;
		
		if($category != null)
		{
			$cat = Category::model()->findByAttributes(array('ownerClass'=>'Photo', 'id'=>$category), array('order'=>'position asc'));
			if($cat == null)
			{
			    $this->render('//site/error404');
			    return false;
			}
		}
		
		$cond = array('ownerClass'=>'Photo');
		$categories = Category::model()->findAllByAttributes($cond, array('order'=>'position asc'));

//		$offset = SPagination::getOffset('Photo');
		$offset = Photo::model()->getOffset();
		if($cat->id == null)
		{
			$this->setPageTitle('Auto - Фотогалерея');
			
//			$pages = SPagination::getPages('Photo');
			$pages = Photo::model()->getPages();
//			$photos = SPagination::getRows('Photo', $offset, Photo::$onPage, 'id');
			$photos = Photo::model()->getRows($offset, null, array('isActive'=>1), 'id DESC');
		}
		else
		{
			$this->setPageTitle('Auto - Фотогалерея/'.$cat->title);
			
//			$pages = SPagination::getPages('Photo', array('catId'=>$cat->id));
			$pages = Photo::model()->getPages(array('catId'=>$cat->id));
//			$photos = SPagination::getRows('Photo', $offset, Photo::$onPage, 'id', array('catId'=>$cat->id));
			$photos = Photo::model()->getRows($offset, null, array('catId'=>$cat->id, 'isActive'=>1), 'id DESC');
		}
		
		$favedIds = array();
		$fav = Session::initArr('favPhotos', true);
		
		foreach($photos as $val)
		{
		    foreach($fav as $val2)
		    {
			if($val->id == $val2['id'])
			{
				$favedIds[] = $val->id;
			}
		    }
		}

		$paginator = new CPagination(Photo::model()->getActiveCount());
		$paginator->pageSize = Photo::model()->limit;
		
		$this->render('index', array(
			'categories'=>$categories,
			'photos'=>$photos,
			'currentPage'=>SPagination::getCurrentPage(),
			'pages'=>$pages,
			'cat'=>$cat,
			'favedIds'=>$favedIds,
			'paginator' => $paginator
		));
	}
	
}
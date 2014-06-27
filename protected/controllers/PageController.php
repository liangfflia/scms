<?php

class PageController extends S_FrontController
{
	
	public function actionView( $alias )
	{
		$data = Page::model()->findByAttributes(array('alias'=>$alias));
		if(count($data))
			$this->render('index', array('data'=>$data));
		else
			$this->defaultError();
	}
			
	
	public function actionIndex()
	{
		
		$this->render('/front/page/index', array('content'=>''));
	}
	
}

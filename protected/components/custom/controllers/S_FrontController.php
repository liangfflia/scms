<?php

class S_FrontController extends Controller
{
    // лейаут
    public $layout = 'application';
        
    // меню
    public $menu = array();
    
    // крошки
    public $breadcrumbs = array();
	
	
	public function renderPage($alias, $view = null)
	{
		$page = Page::model()->findByAttributes(array('alias' => $alias));
		if($view && $page)
			$this->renderPartial($view, array('page'=>$page));
		else
			echo $page->text;
	}
	
}
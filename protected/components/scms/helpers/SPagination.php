<?php

class SPagination
{
	
	static public function getOffset($modelClass)
	{
		$offset = null;
		if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 1)
		{
			$offset = $_GET['page'] * $modelClass::$onPage - $modelClass::$onPage;
		}
		return $offset;
	}
	

	static public function getRows($modelClass, $offset = null, $limit = 9, $order='dateAdded DESC', $conditionArr = null)
	{
		if($offset == null)
		{
			if($conditionArr == null)
				$modelsList = $modelClass::model()->findAll(array('limit'=>$limit, 'order' => $order));
			else
				$modelsList = $modelClass::model()->findAllByAttributes($conditionArr, array('limit'=>$limit, 'order' => $order));;
		}
		else
		{
			if($conditionArr == null)
				$modelsList = $modelClass::model()->findAll(array('limit'=>$limit, 'order' => $order, 'offset' => $offset));
			else
				$modelsList = $modelClass::model()->findAllByAttributes($conditionArr, array('limit'=>$limit, 'order' => $order, 'offset' => $offset));
		}
		
		return $modelsList;
	}
	
	
	static public function getCurrentPage()
	{
		$page = 1;
		if(isset($_GET['page']) && !empty($_GET['page']))
			$page = $_GET['page'];
		return $page;
	}
	
	
	static public function getPages($modelClass, $cond = null)
	{
		$pages = 1;
		if($cond == null)
		    $count = $modelClass::model()->count();
		elseif(is_array($cond))
		    $count = $modelClass::model()->countByAttributes($cond);
		else
		    $count = $modelClass::model()->count($cond);
		
		if($count)
		{
			$pages = (int)($count / $modelClass::$onPage);
			if($count % $modelClass::$onPage != 0)
				$pages++;
		}
		return $pages;
	}
	
}
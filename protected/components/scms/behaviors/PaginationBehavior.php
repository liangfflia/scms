<?php

class PaginationBehavior extends CActiveRecordBehavior
{
	
	public function getOffset()
	{
		$model = $this->getOwner();
		
		$offset = null;
		if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 1)
		{
			$offset = $_GET['page'] * $model->limit - $model->limit;
		}
		return $offset;
	}
	
	
	public function getLimit()
	{
		return $this->getOwner()->limit;
	}
	

	public function getRows($offset = null, $limit = null, $conditionArr = null, $order='dateAdded DESC')
	{
		
		$model = $this->getOwner();
		
		if($limit == null)
			$limit = $model->limit;

		if($offset == null)
		{
			if($conditionArr == null)
				$modelsList = $model::model()->findAll(array('limit'=>$limit, 'order' => $order));
			else
				$modelsList = $model::model()->findAllByAttributes($conditionArr, array('limit'=>$limit, 'order' => $order));;
		}
		else
		{
			if($conditionArr == null)
				$modelsList = $model::model()->findAll(array('limit'=>$limit, 'order' => $order, 'offset' => $offset));
			else
				$modelsList = $model::model()->findAllByAttributes($conditionArr, array('limit'=>$limit, 'order' => $order, 'offset' => $offset));
		}

		return $modelsList;
	}
	
	
	public function getCurrentPage()
	{
		$page = 1;
		if(isset($_GET['page']) && !empty($_GET['page']))
			$page = $_GET['page'];
		return $page;
	}
	
	
	public function getPages($cond = null)
	{
		$modelClass = $this->getOwner();
		
		$pages = 1;
		if($cond == null)
		    $count = $modelClass::model()->count();
		elseif(is_array($cond))
		    $count = $modelClass::model()->countByAttributes($cond);
		else
		    $count = $modelClass::model()->count($cond);
		
		if($count)
		{
			$pages = (int)($count / $modelClass->limit);
			if($count % $modelClass->limit != 0)
				$pages++;
		}
		return $pages;
	}
	
	
	public function getActiveCount()
	{
	    $owner = $this->getOwner();
	    return $owner::model()->count('`isActive` = "1"');
	}
	
}
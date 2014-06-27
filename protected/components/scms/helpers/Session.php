<?php

class Session
{
    
	static public function getIds( $name )
	{
	    $std = new stdClass();
		$ids = array();
		$arr = array();
		foreach(Yii::app()->session[$name] as $key => $val)
		{
			$ids[] = $val['itemId'];
			$arr[$key] = $val['itemId'];
		}
		$std->ids = $ids;
		$std->arr = $arr;
		return $std;
	}
	
	
	static public function initArr($name, $return = false)
	{
		if(!isset(Yii::app()->session[$name]) || !is_array(Yii::app()->session[$name]))
			Yii::app()->session[$name] = array();
		if($return)
			return Yii::app()->session[$name];
	}
	
	
	static public function put( $name, $data )
	{

		$session = Yii::app()->session;
		if (!isset($session[$name]) || count($session[$name]) == 0) 
		{
		   $session[$name] = array($data);
		}
		else
		{
		   $myarr = $session[$name];
		   $myarr[] = $data;
		   $session[$name] = $myarr;
		}
	}
    
	
	static public function delByAttribute($name, array $data)
	{
		$result = array();
	    foreach(Yii::app()->session[$name] as $key => $val)
	    {
			foreach($data as $k2 => $v2)
			{
				if( isset($val[$k2]) && $val[$k2] == $v2) { }
				else
				{
					$result[] = $val;
				}
			}
	    }
		
		unset(Yii::app()->session[$name]);
		
		if(!empty($result))
		{
			foreach($result as $val)
			{
				Session::put($name, $val);
			}
		}
		
		
		
//		echo CVarDumper::dump($result,10,true); exit;
	}
}
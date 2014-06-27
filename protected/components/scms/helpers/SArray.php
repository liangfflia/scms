<?php

class SArray
{
	
    static public function slice($perPage, array $arr)
    {
	    $tmpArr = array();

	    if(count($arr) < $perPage)
	    {
		    $tmpArr[] = $arr;
		    return $tmpArr;
	    }

	    $count = count($arr);
	    $pieces = $count / $perPage;

	    if($count % $perPage != 0)
		    $pieces++;

	    $res = array();

	    $i = 1;
	    $k = 0;
	    foreach($arr as $key=>$val)
	    {
		    $tmpArr[] = $val;
		    if($i % $perPage == 0)
		    {
			    $res[$k] = $tmpArr;
			    $tmpArr = array();
			    $k++;
		    }
		    elseif(!array_key_exists($key+1, $arr))
		    {
			    $res[$k] = $tmpArr;
		    }
		    $i++;
	    }
	    return $res;
    }
	
}
<?php

class SFile
{
	
	static public function rmdir($path)
	{
		if(is_dir($path))
		{
			if ($objs = glob($path."/*"))
			{
				foreach($objs as $obj)
				{
					is_dir($obj) ? self::rmdir($obj) : unlink($obj);
				}
			}
			if((count(scandir($path)) == 2))
			{
				rmdir($path);
			}
		}
	}
	
	
	static public function clearDir($path)
	{
		if(is_dir($path))
		{
			if ($objs = glob($path."/*"))
			{
				foreach($objs as $obj)
				{
					is_dir($obj) ? self::rmdir($obj) : unlink($obj);
				}
			}
		}
	}
	
}
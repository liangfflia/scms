<?php


class SMoney
{
	static public function uahs($dollars, $course)
	{
		$uahs = (int)($dollars * $course);
		return number_format($uahs, 0, null, ' ');
	}
	
	
	static public function dollars($uah, $course)
	{
		
	}
	
}
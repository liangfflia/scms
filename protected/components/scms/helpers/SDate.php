<?php

class SDate
{
	
	static public function notEmpty($date)
	{
		if (is_string($date))
		{
		    if (trim(preg_replace('/[\:\-\s]+/', '', trim($date)), '0') == '') return false;
		    
		    $date = strtotime($date);
		}
		
		return (bool)$date;
	}
	
	
	static public function get($date, $format = 'd/m/Y')
	{
		return (SDate::notEmpty($date)?date($format, strtotime($date)):"-");
	}
	
	
	public static function span($remote, $local = NULL, $output = 'years,months,weeks,days,hours,minutes,seconds')
	{
		// Normalize output
		$output = trim(strtolower((string) $output));

		if ( ! $output)
		{
			// Invalid output
			return FALSE;
		}

		// Array with the output formats
		$output = preg_split('/[^a-z]+/', $output);

		// Convert the list of outputs to an associative array
		$output = array_combine($output, array_fill(0, count($output), 0));

		// Make the output values into keys
		extract(array_flip($output), EXTR_SKIP);

		if ($local === NULL)
		{
			// Calculate the span from the current time
			$local = time();
		}

		// Calculate timespan (seconds)
		$timespan = abs($remote - $local);

		if (isset($output['years']))
		{
			$timespan -= Kohana_Date::YEAR * ($output['years'] = (int) floor($timespan / Kohana_Date::YEAR));
		}

		if (isset($output['months']))
		{
			$timespan -= Kohana_Date::MONTH * ($output['months'] = (int) floor($timespan / Kohana_Date::MONTH));
		}

		if (isset($output['weeks']))
		{
			$timespan -= Kohana_Date::WEEK * ($output['weeks'] = (int) floor($timespan / Kohana_Date::WEEK));
		}

		if (isset($output['days']))
		{
			$timespan -= Kohana_Date::DAY * ($output['days'] = (int) floor($timespan / Kohana_Date::DAY));
		}

		if (isset($output['hours']))
		{
			$timespan -= Kohana_Date::HOUR * ($output['hours'] = (int) floor($timespan / Kohana_Date::HOUR));
		}

		if (isset($output['minutes']))
		{
			$timespan -= Kohana_Date::MINUTE * ($output['minutes'] = (int) floor($timespan / Kohana_Date::MINUTE));
		}

		// Seconds ago, 1
		if (isset($output['seconds']))
		{
			$output['seconds'] = $timespan;
		}

		if (count($output) === 1)
		{
			// Only a single output was requested, return it
			return array_pop($output);
		}

		// Return array
		return $output;
	}
	
}
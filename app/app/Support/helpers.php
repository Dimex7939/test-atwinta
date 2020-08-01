<?
if (! function_exists('countTimeAgo')) 
{
	function countTimeAgo($time)
	{
		$time_ago = time() - strtotime($time);
		if($time_ago < 60)
			$time_ago = 'Сейчас';
		elseif($time_ago < 3600)
			$time_ago = round($time_ago/60).' минут назад';
		elseif($time_ago < 86400)
			$time_ago = round($time_ago/60/60).' часов назад';
		return $time_ago;
	}
}
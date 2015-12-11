<?php
	class Settings
	{
		public static function GetSettings($param)
		{
			$val = DB::table('settings')->where('parameter', $param)->pluck('value');
			return $val;
		}
	}

?>
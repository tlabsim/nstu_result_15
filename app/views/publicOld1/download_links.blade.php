<?php

	if(!isset($unit)) return;

	if($unit != '_')
	{		
		$is_result_published = DB::table('units')->where('unit', $unit)->pluck('is_result_published');
		if(empty($is_result_published))
		{
			echo 'Result not yet published';
			return;
		}
	}

	$all_unit_downloads = DownloadLink::whereRaw('unit = ? and is_dead = 0', array($unit))->get();
	if($all_unit_downloads->count() > 0)
	{
		echo '<ul class="list-group">';
		foreach ($all_unit_downloads as $dl)
		{		
			echo '<li class="list-group-item">';
			echo '<span class="badge">'.$dl->subtitle.'</span>';
			echo '<a target = "blank" href="'.$dl->link.'">'.$dl->title.'</a>';
			echo '</li>';													
		}
		echo '</ul>';	
	}
	else
	{
		echo 'No Downloads';
	}
?>
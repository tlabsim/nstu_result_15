<?php

class SearchController extends \BaseController {

	public function search()
	{
		$keyword = Input::get('keyword');
		if(!empty($keyword))
		{			
			return View::make('public.search')->with('keyword', $keyword);
		}
		else
		{
			return View::make('public.search');
		}
		
	}
}
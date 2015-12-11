<?php

class ResultController extends BaseController {

	public function search()
	{
		$roll = Input::get('roll');
		return View::make('public.result')->with('roll', $roll);
	}
}


?>
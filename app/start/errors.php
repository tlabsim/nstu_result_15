<?php

App::error(function($exception, $code) 
{   

    if ($exception instanceof Illuminate\Database\Eloquent\ModelNotFoundException) 
	{
        return View::make('errors.show', array('error_title'=>'Model Not found', 'error_code'=>'Error', 'error_details'=>'Model Not Found'));
    }
	elseif($exception instanceof Symfony\Component\HttpKernel\Exception\NotFoundHttpException) 
	{
        return View::make('errors.show', array('error_title'=>'Error 404 | Page Not found', 'error_code'=>'404', 'error_details'=>'Page Not Found'));
    }
	

    switch ($code) {
        case 400:
            return View::make('errors.show', array('error_title'=>'Error 400 | Bad Request', 'error_code'=>'400', 'error_details'=>'Bad Request'));
            break;
        case 401:
        case 402:
            return View::make('errors.show', array('error_title'=>'Error'.$code.' | Unauthorized Access', 'error_code'=>$code, 'error_details'=>'Unauthorized Access'));
            break;
        case 404:
            return View::make('errors.show', array('error_title'=>'Error 401 | Page Not Found', 'error_code'=>'404', 'error_details'=>'Page Not Found'));
            break;
        case 408:
            return View::make('errors.show', array('error_title'=>'Error 408 | Request Timeout', 'error_code'=>'408', 'error_details'=>'Request Timeout'));
            break;
      

        default:
            return View::make('errors.show', array('error_title'=>'Error', 'error_code'=>'Error', 'error_details'=>'OOPS! Something went wrong'));
            break;
    }
});

?>
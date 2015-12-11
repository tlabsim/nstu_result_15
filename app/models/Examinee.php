<?php

class Examinee extends Eloquent {
	protected $table = 'examinees';
	protected $primaryKey = 'exam_roll';

	public $timestamps = true;
}
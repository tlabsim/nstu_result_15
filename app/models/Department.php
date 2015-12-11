<?php

class Department extends Eloquent {
	protected $table = 'departments';
	protected $primaryKey = 'dept_id';

	public $timestamps = true;
}
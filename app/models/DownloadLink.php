<?php

class DownloadLink extends Eloquent {
	protected $table = 'download_links';
	protected $primaryKey = 'link_id';

	public $timestamps = true;
}
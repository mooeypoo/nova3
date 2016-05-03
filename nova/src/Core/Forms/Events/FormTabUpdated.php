<?php namespace Nova\Core\Forms\Events;

use NovaFormTab;
use Nova\Foundation\Events\Event;
use Illuminate\Queue\SerializesModels;

class FormTabUpdated extends Event {

	use SerializesModels;

	public $resource;
	public $creating = false;
	public $updating = true;
	public $deleting = false;

	public function __construct(NovaFormTab $resource)
	{
		$this->resource = $resource;
	}

}
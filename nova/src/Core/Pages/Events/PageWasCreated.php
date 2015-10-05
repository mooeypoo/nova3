<?php namespace Nova\Core\Pages\Events;

use Page;
use Nova\Foundation\Events\Event;
use Illuminate\Queue\SerializesModels;

class PageWasCreated extends Event {

	use SerializesModels;

	protected $resource;

	public function __construct(Page $resource)
	{
		$this->resource = $resource;
	}

}

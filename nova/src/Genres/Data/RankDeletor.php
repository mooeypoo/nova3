<?php namespace Nova\Genres\Data;

use Nova\Foundation\Data\BindsData;
use Nova\Foundation\Data\Deletable;

class RankDeletor implements Deletable
{
	use BindsData;

	public function delete($item)
	{
		// Delete the rank item
		$item->delete();

		return $item;
	}
}

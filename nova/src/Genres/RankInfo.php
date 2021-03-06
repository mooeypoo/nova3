<?php namespace Nova\Genres;

use Eloquent;
use Nova\Foundation\Data\Reorderable;

class RankInfo extends Eloquent
{
	use Reorderable;

	protected $table = 'ranks_info';
	protected $fillable = ['name', 'short_name', 'order'];

	//--------------------------------------------------------------------------
	// Relationships
	//--------------------------------------------------------------------------

	public function ranks()
	{
		return $this->hasMany(Rank::class, 'info_id');
	}
}

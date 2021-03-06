<?php namespace Nova\Foundation\Data;

use Nova\Media\Media;
use Nova\Foundation\Data\BindsData;

class MediaUpdater implements Updatable
{
	use BindsData;

	public function update($media)
	{
		$media->update($this->data);

		return $media->fresh();
	}

	public function updateAll()
	{
		foreach ($this->data as $data) {
			$media = Media::find($data['id']);

			if ($media) {
				$media->update($data);
			}
		}

		return true;
	}
}

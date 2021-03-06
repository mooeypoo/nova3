<?php namespace Nova\Foundation\Theme;

use Str;

trait Icons
{
	public $iconTemplate = '<i class="fa fa-%1$s %2$s fa-fw"></i>';

	public function getIcon($icon)
	{
		return $this->iconMap()->get($icon);
	}

	public function iconMap()
	{
		return collect([
			'add' => 'plus',
			'add-alt' => 'plus-circle',
			'arrow-down' => 'arrow-alt-circle-down',
			'arrow-left' => 'arrow-alt-circle-left',
			'arrow-right' => 'arrow-alt-circle-right',
			'arrow-up' => 'arrow-alt-circle-up',
			'bars' => 'bars',
			'card' => 'address-card',
			'cards' => 'th-large',
			'check' => 'check',
			'check-alt' => 'check-circle',
			'chevron-left' => 'chevron-left',
			'chevron-right' => 'chevron-right',
			'clock' => 'clock',
			'close' => 'times',
			'close-alt' => 'times-circle',
			'comment' => 'comment-alt',
			'copy' => 'clone',
			'delete' => 'trash-alt',
			'download' => 'cloud-download-alt',
			'edit' => 'pencil',
			'email' => 'paper-plane',
			'exclamation' => 'exclamation-circle',
			'extension' => 'puzzle-piece',
			'filter' => 'filter',
			'heart' => 'heart',
			'image' => 'image',
			'images' => 'images',
			'info' => 'info-circle',
			'link' => 'link',
			'list' => 'list-alt',
			'lock' => 'lock-alt',
			'magic' => 'magic',
			'minus' => 'minus-circle',
			'more' => 'angle-down',
			'move' => 'arrows-alt',
			'question' => 'question-circle',
			'reorder' => 'arrows-alt-v',
			'search' => 'search',
			'settings' => 'cog',
			'settings-alt' => 'cogs',
			'share' => 'share-alt',
			'star' => 'star',
			'tasks' => 'tasks',
			'theme' => 'paint-brush',
			'undo' => 'undo',
			'upload' => 'cloud-upload-alt',
			'user' => 'user',
			'user-alt' => 'user-circle',
			'users' => 'users',
			'warning' => 'exclamation-triangle',
			'write' => 'edit',
		]);
	}

	public function renderIcon($icon, $additional = false)
	{
		if (Str::contains($icon, '.svg')) {
			return $this->renderSvgIcon(locate()->svg($icon), $additional);
		}

		if (strrpos($icon, '.')) {
			return $this->renderImageIcon(locate()->image($icon), $additional);
		}

		return $this->renderFontIcon($icon, $additional);
	}

	public function renderImageIcon($icon, $additional = false)
	{
		return app('html')->image($icon, $additional);
	}

	public function renderFontIcon($icon, $additional = false)
	{
		return sprintf($this->iconTemplate, $this->getIcon($icon), $additional);
	}

	public function renderSvgIcon($icon, $additional = false)
	{
		return svg_icon($icon, $additional)->toHtml();
	}
}

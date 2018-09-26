<?php

namespace Nova\Themes;

use Str;

trait Icons
{
	public $spriteMap = 'nova/resources/svg/feather-map.svg';

	public function iconMap()
	{
		return collect([
			'activity' => 'activity',
			'add' => 'plus-circle',
			'alert' => 'alert-circle',
			'arrow-down' => 'arrow-down',
			'arrow-left' => 'arrow-left',
			'arrow-right' => 'arrow-right',
			'arrow-up' => 'arrow-up',
			'award' => 'award',
			'notification' => 'bell',
			'bookmark' => 'bookmark',
			'calendar' => 'calendar',
			'check' => 'check',
			'check-alt' => 'check-circle',
			'chevron-down' => 'chevron-down',
			'chevron-left' => 'chevron-left',
			'chevron-right' => 'chevron-right',
			'chevron-up' => 'chevron-up',
			'clock' => 'clock',
			'close' => 'x',
			'close-alt' => 'x-circle',
			'code' => 'code',
			'comment' => 'message-circle',
			'copy' => 'copy',
			'delete' => 'trash',
			'download' => 'download-cloud',
			'edit' => 'edit-2',
			'email' => 'at-sign',
			'external' => 'external-link',
			'file' => 'file-text',
			'filter' => 'filter',
			'flag' => 'flag',
			'grid' => 'grid',
			'heart' => 'heart',
			'home' => 'home',
			'image' => 'image',
			'inbox' => 'inbox',
			'info' => 'info',
			'layers' => 'layers',
			'layout' => 'layout',
			'link' => 'link',
			'list' => 'list',
			'lock' => 'lock',
			'menu' => 'menu',
			'minus' => 'minus-circle',
			'more' => 'more-vertical',
			'move' => 'move',
			'question' => 'help-circle',
			'refresh' => 'refresh-cw',
			'report' => 'trending-up',
			'search' => 'search',
			'send' => 'send',
			'settings' => 'settings',
			'share' => 'share',
			'shield' => 'shield',
			'sign-in' => 'log-in',
			'sign-out' => 'log-out',
			'slash' => 'slash',
			'star' => 'star',
			'tag' => 'tag',
			'undo' => 'rotate-ccw',
			'upload' => 'upload-cloud',
			'user' => 'user',
			'user-alt' => 'user',
			'users' => 'users',
			'view' => 'eye',
			'warning' => 'alert-triangle',
			'write' => 'edit',
		]);
	}

	public function iconTemplate()
	{
		return sprintf(
			'<svg class="icon feather-{icon}"><use xlink:href="%s#{icon}"/></svg>',
			url($this->spriteMap)
		);
	}
}

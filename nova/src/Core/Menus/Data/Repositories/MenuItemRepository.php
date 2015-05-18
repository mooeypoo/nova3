<?php namespace Nova\Core\Menus\Data\Repositories;

use Menu,
	MenuItem as Model,
	MenuItemRepositoryInterface;
use Nova\Foundation\Data\Repositories\BaseRepository;

class MenuItemRepository extends BaseRepository implements MenuItemRepositoryInterface {

	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	public function getMainMenuItems($menu)
	{
		return $this->model->where('menu_id', '=', $menu)
			->where('parent_id', '=', 0)
			->orderBy('order', 'asc')
			->get();
	}

	public function getSubMenuItems($menu)
	{
		return $this->model->where('menu_id', '=', $menu)
			->where('parent_id', '!=', 0)
			->orderBy('order', 'asc')
			->get();
	}

	public function getSubMenuItemsAsArray($menu)
	{
		$items = $this->getSubMenuItems($menu);

		$list = [];

		if ($items)
		{
			foreach ($items as $item)
			{
				$list[$item->parent_id][] = $item;
			}
		}

		return $list;
	}

	public function reorder(Menu $menu, array $newPositions)
	{
		// Get all the menu items
		$items = $menu->menuItems;

		foreach ($newPositions as $parentId => $positions)
		{
			if (is_array($positions))
			{
				foreach ($positions as $order => $itemId)
				{
					$itemCollection = $items->filter(function($i) use ($itemId)
					{
						return $i->id == $itemId;
					});

					foreach ($itemCollection as $item)
					{
						$item->fill([
							'order'		=> $order,
							'parent_id'	=> $parentId,
						])->save();
					}
				}
			}
		}
	}

}
<?php namespace Nova\Core\Menus\Http\Controllers;

use Str,
	Flash,
	Input,
	BaseController,
	EditMenuRequest,
	CreateMenuRequest,
	RemoveMenuRequest,
	MenuRepositoryInterface,
	MenuItemRepositoryInterface;
use Nova\Core\Menus\Events\MenuWasCreated,
	Nova\Core\Menus\Events\MenuWasDeleted,
	Nova\Core\Menus\Events\MenuWasUpdated;
use Illuminate\Contracts\Foundation\Application;

class MenuController extends BaseController {

	protected $repo;

	public function __construct(Application $app, MenuRepositoryInterface $repo,
			MenuItemRepositoryInterface $items)
	{
		parent::__construct($app);

		$this->repo = $repo;
		$this->itemRepo = $items;

		$this->middleware('auth');
	}

	public function index()
	{
		$this->view = 'admin/menus/menus';
		$this->jsView = 'admin/menus/menus-js';

		$this->data->menus = $this->repo->all();
	}

	public function create()
	{
		$this->view = 'admin/menus/menu-create';
		$this->jsView = 'admin/menus/menu-create-js';
	}

	public function store(CreateMenuRequest $request)
	{
		// Create the menu
		$menu = $this->repo->create(Input::all());

		// Fire the event
		event(new MenuWasCreated($menu));

		// Set the flash message
		Flash::success("Menu has been created.");

		return redirect()->route('admin.menus');
	}

	public function edit($menuId)
	{
		$this->view = 'admin/menus/menu-edit';
		$this->jsView = 'admin/menus/menu-edit-js';

		$this->data->menu = $this->repo->find($menuId);
	}

	public function update(EditMenuRequest $request, $menuId)
	{
		// Update the menu
		$menu = $this->repo->update($menuId, Input::all());

		// Fire the event
		event(new MenuWasUpdated($menu));

		// Set the flash message
		Flash::success("Menu has been updated.");

		return redirect()->route('admin.menus');
	}

	public function remove($menuId)
	{
		$this->isAjax = true;

		// Grab the menu we're removing
		$menu = $this->repo->find($menuId);

		// Grab all the menus
		$menus = $this->repo->listAllFiltered('name', 'id', $menu->id);

		// Build the body based on whether we found the menu or not
		$body = ($menu)
			? view(locate('page', 'admin/menus/menu-remove'), compact('menu', 'menus'))
			: alert('danger', "Menu not found.");

		return partial('modal-content', [
			'header' => "Remove Menu",
			'body' => $body,
			'footer' => false,
		]);
	}

	public function destroy(RemoveMenuRequest $request, $menuId)
	{
		// Delete the menu
		$menu = $this->repo->delete($menuId);

		// Fire the event
		event(new MenuWasDeleted($menu->key, $menu->name));

		// Set the flash message
		Flash::success("Menu has been removed.");

		return redirect()->route('admin.menus');
	}

	public function items($menuId)
	{
		$this->view = 'admin/menus/menu-items';
		$this->jsView = 'admin/menus/menu-items-js';
		$this->styleView = 'admin/menus/menu-items-style';

		$this->data->menu = $this->repo->find($menuId);
		$this->data->mainMenuItems = $this->itemRepo->getMainMenuItems($menuId);
		$this->data->subMenuItems = $this->itemRepo->getSubMenuItemsAsArray($menuId);
	}

	public function reorder()
	{
		$this->isAjax = true;

		// Get the menu collection
		$menu = $this->repo->find(Input::get('menu'));

		// Re-order the menu items
		$this->itemRepo->reorder($menu, Input::get('positions'));
	}

	public function checkMenuKey()
	{
		$this->isAjax = true;

		$count = $this->repo->countBy('key', Input::get('key'));

		if ($count > 0)
		{
			return json_encode(['code' => 0]);
		}

		return json_encode(['code' => 1]);
	}

	public function generateMenuKey()
	{
		$this->isAjax = true;

		return Str::slug(Input::get('name'));
	}

	public function pages($menuId)
	{
		$this->view = 'menu-pages';

		// Get the menu
		$this->data->menu = $menu = $this->repo->find($menuId);

		// Get the pages for the menu
		$this->data->pages = $this->repo->getPages($menu);
	}

}
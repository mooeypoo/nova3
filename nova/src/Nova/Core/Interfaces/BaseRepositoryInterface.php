<?php namespace Nova\Core\Interfaces;

interface BaseRepositoryInterface {

	/**
	 * Get everything out of the database.
	 *
	 * @return	Collection
	 */
	public function all();
	
	/**
	 * Create a new item.
	 *
	 * @param	array	$data	Data to use for creation
	 * @return	object
	 */
	public function create(array $data);

	/**
	 * Delete an item.
	 *
	 * @param	array	$data	Data to use for delete
	 * @return	bool
	 */
	public function delete(array $data);

	/**
	 * Find an item by ID.
	 *
	 * @param	int		$id		ID to find
	 * @return	object
	 */
	public function find($id);

	/**
	 * Update an item.
	 *
	 * @param	array	$data	Data to use for update
	 * @return	object
	 */
	public function update(array $data);

}
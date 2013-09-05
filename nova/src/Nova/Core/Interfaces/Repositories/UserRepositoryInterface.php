<?php namespace Nova\Core\Interfaces\Repositories;

use BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface {

	/**
	 * Get all active users.
	 *
	 * @return	Collection
	 */
	public function active();

	/**
	 * Find a user by their name.
	 *
	 * @param	string	$name	Name to find
	 * @return	Collection
	 */
	public function findByName($name);

	/**
	 * Find a user by their email address.
	 *
	 * @param	string	$email	Email to find
	 * @return	User
	 */
	public function findByEmail($email);

	/**
	 * Get all inactive users.
	 *
	 * @return	Collection
	 */
	public function inactive();

	/**
	 * Get all pending users.
	 *
	 * @return	Collection
	 */
	public function pending();

}
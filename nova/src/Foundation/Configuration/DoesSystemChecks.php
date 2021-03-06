<?php namespace Nova\Foundation\Configuration;

trait DoesSystemChecks
{
	/**
	 * Check to see if a component is configured.
	 *
	 * @param	string	$component
	 * @return	bool
	 */
	public function isConfigured($component)
	{
		switch ($component) {
			case 'db':
			case 'database':
				return file_exists(app()->appConfigPath('database.php'));
				break;

			case 'mail':
			case 'email':
				return file_exists(app()->appConfigPath('mail.php'));
				break;

			case 'session':
				return file_exists(app()->appConfigPath('session.php'));
				break;
		}

		return false;
	}

	public function isInstalled()
	{
		return app('filesystem')->disk('local')->has('installed.json');
	}
}

<?php namespace Nova\Setup\Http\Controllers;

use PDO;
use PDOException;
use Illuminate\Http\Request;
use Nova\Setup\ConfigFileWriter;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Database\Connectors\Connector;

class ConfigNova2Controller extends Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->middleware('nova.auth-setup');
	}

	public function info()
	{
		return view('setup.config.nova2-info');
	}

	public function check(Request $request, Connector $connector, Filesystem $files)
	{
		if ($request->get('nova2_db_name') == "") {
			flash()->error("No Database Found", "Please enter a database name to configure your Nova 2 database connection.");

			return redirect()->back()->withInput();
		}

		// Set the session variables
		session(['nova2_dbName' => trim($request->get('nova2_db_name'))]);
		session(['nova2_dbUser' => trim($request->get('nova2_db_user'))]);
		session(['nova2_dbPass' => trim($request->get('nova2_db_password'))]);
		session(['nova2_dbHost' => trim($request->get('nova2_db_host'))]);
		session(['nova2_prefix' => trim($request->get('nova2_db_prefix'))]);
		session(['nova2_genre' => trim($request->get('nova2_genre'))]);
		session(['nova2_use_data' => ($request->get('nova2_use_data') == 'on') ? 1 : 0]);

		config([
			"database.connections.nova2.host" => session('nova2_dbHost'),
			"database.connections.nova2.database" => session('nova2_dbName'),
			"database.connections.nova2.username" => session('nova2_dbUser'),
			"database.connections.nova2.password" => session('nova2_dbPass'),
			"database.connections.nova2.prefix" => session('nova2_prefix')
		]);

		// Build the config array
		$config = [
			'host'		=> config("database.connections.nova2.host"),
			'database'	=> config("database.connections.nova2.database"),
			'username'	=> config("database.connections.nova2.username"),
			'password'	=> config("database.connections.nova2.password"),
		];

		try {
			// Build the DSN
			$dsn = "mysql:host={$config['host']};dbname={$config['database']}";

			// Try to connect to the database
			$connection = $connector->createConnection(
				$dsn,
				$config,
				$connector->getDefaultOptions()
			);

			// Grab the config writer
			$writer = new ConfigFileWriter($files);

			// Write the Nova 2 config file
			$writer->write('nova2', [
				"#NOVA2_DB_PREFIX#" => session('nova2_prefix'),
				"#NOVA2_GENRE#" => session('nova2_genre'),
				"#NOVA2_USE_DATA#" => session('nova2_use_data'),
			]);

			return redirect()->route("setup.{$this->setupType}.config.nova2.success");
		} catch (PDOException $e) {
			$msg = (string) $e->getMessage();

			if (stripos($msg, 'No such host is known') !== false) {
				flash()->error("Database Host Not Found", "The database host you provided couldn't be found. Most of the time, web hosts use `localhost`, but in some instances, they set up their servers differently. Check with your web host about the proper database host to use and try again.");
			} elseif (stripos($msg, 'Access denied for user') !== false) {
				flash()->error("User/Password Issue", "The username and/or password you provided doesn't seem to work. Double check your username and/or password and try again.");
			} elseif (stripos($msg, 'Unknown database') !== false) {
				$dbName = session('nova2_dbName');

				flash()->error("Database Not Found", sprintf("A successful connection was made to your database server (which means your username and password are fine) but the database `%s` couldn't be found.\r\n\r\n- Are you sure it exists?\r\n- Do you have permissions to use the `%s` database?\r\n- On some systems the name of your database is prefixed with your username, like `%s_%s`. Could that be the problem?\r\n\r\nIf you're not sure how to setup a database or what your database connection settings are, you should contact your web host.", $dbName, $dbName, session('dbUser'), $dbName));
			} else {
				flash()->error("Unknown Database Issue", "There was an unidentified error when trying to connect to the database. This could be caused by incorrect database connection settings or the database server being down. Check with your web host to see if there are any issues and try again.\r\n\r\n`".$e->getMessage()."`");
			}

			return redirect()->route("setup.{$this->setupType}.config.nova2")->withInput();
		}
	}

	public function success()
	{
		return view('setup.config.nova2-success');
	}
}

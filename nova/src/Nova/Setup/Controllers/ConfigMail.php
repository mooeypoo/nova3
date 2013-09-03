<?php namespace Nova\Setup\Controllers;

use App;
use File;
use Form;
use HTML;
use Cache;
use Input;
use Session;
use SetupBaseController;

class ConfigMail extends SetupBaseController {

	public function getIndex()
	{
		// Set the view file
		$this->_view = 'setup/config/email';

		// Set the title and header
		$this->_title = $this->_header = 'Email Setup';

		// Pass the step along
		$this->_data->step = false;

		// Clear the installed status cache
		Cache::forget('nova.installed');
		
		// Make sure we don't time out
		set_time_limit(0);
		
		if ( ! File::exists(SRCPATH.'Setup/generators/mail.php'))
		{
			$this->_data->message = lang('setup.config.noconfig', 'email config', 'mail');
			$this->_header = 'File Not Found';
			$this->_controls = HTML::link('setup/config/email', 'Try Again', ['class' => 'pull-right']);
		}
		else
		{
			if (File::exists(APPPATH.'config/'.App::environment().'/mail.php'))
			{
				$this->_data->message = lang('setup.config.exists', 'email config', App::environment());
				$this->_controls = HTML::link('setup', 'Back to Setup Center', ['class' => 'pull-right']);
			}
			else
			{
				if (version_compare(PHP_VERSION, '5.4.0', '<'))
				{
					$this->_data->message = lang('setup.config.php', PHP_VERSION);
					$this->_header = 'Installation Cannot Continue';
				}
				else
				{

					$this->_data->message = lang('setup.config.email.intro', App::environment());
					$this->_controls = HTML::link('setup/config/email/info', 'Start', ['class' => 'btn btn-primary']);
				}
			}
		}
	}

	public function getInfo()
	{
		// Set the view files
		$this->_view = 'setup/config/email';
		$this->_jsView = 'setup/config/email_js';

		// Set the title and header
		$this->_title = 'Email Setup';
		$this->_header = 'Email Info <small>Email Setup</small>';

		// Pass the step along
		$this->_data->step = 'info';

		$this->_data->message = lang('setup.config.email.info');
		$this->_controls = Form::button('Write Config File', array(
				'name'	=> 'next',
				'class'	=> 'btn btn-primary',
				'id'	=> 'next',
				'type'	=> 'submit',
			)).
			Form::token().
			Form::close();
	}

	public function postWrite()
	{
		// Set the view
		$this->_view = 'setup/config/email';

		// Set the title and header
		$this->_title = 'Email Setup';
		$this->_header = 'Write Email Config <small>Email Setup</small>';

		// Set the step
		$this->_data->step = false;

		// Set the session variables
		Session::put('emailDrvr', trim(e(Input::get('driver'))));
		Session::put('emailHost', trim(e(Input::get('hostname'))));
		Session::put('emailPort', trim(e(Input::get('port'))));
		Session::put('emailPass', trim(e(Input::get('password'))));
		Session::put('emailUser', trim(e(Input::get('username'))));
		Session::put('emailEncr', trim(e(Input::get('encryption'))));
		Session::put('emailSend', trim(e(Input::get('sendmailpath'))));

		// Get the file
		$emailFileContents = File::get(SRCPATH.'Setup/generators/mail.php');

		if ($emailFileContents !== false)
		{
			// Set what should be replaced
			$replacements = [
				'#DRIVER#'		=> Session::get('emailDrvr'),
				'#HOSTNAME#'	=> Session::get('emailHost'),
				'#USERNAME#'	=> Session::get('emailUser'),
				'#PASSWORD#'	=> Session::get('emailPass'),
				"'#PORT#'"		=> Session::get('emailPort'),
				'#ENCRYPTION#'	=> Session::get('emailEncr'),
				'#SENDMAILPATH#'=> Session::get('emailSend'),
			];

			// Loop through and do the replacements
			foreach ($replacements as $key => $value)
			{
				$emailFileContents = str_replace($key, $value, $emailFileContents);
			}

			// Try to chmod the config directory to the proper permissions
			chmod(APPPATH.'config/'.App::environment(), 0777);

			// Write the contents of the file
			$write = File::put(APPPATH.'config/'.App::environment().'/mail.php', $emailFileContents);

			if ($write !== false)
			{
				// Try to chmod the file to the proper permissions
				chmod(APPPATH.'config/'.App::environment().'/mail.php', 0666);

				// Set the success message
				$this->_data->message = lang('setup.config.email.write.success');
				
				// Wipe out the session data
				Session::flush();
				
				// Write the controls
				$this->_controls = HTML::link('setup', 'Back to Setup Center', ['class' => 'btn btn-primary']);
			}
			else
			{
				// Dump the code to a variable
				$this->_data->code = e("<?php

return array(
'driver' => '".Session::get('emailDrvr')."',
'host' => '".Session::get('emailHost')."',
'port' => ".Session::get('emailPort').",
'encryption' => '".Session::get('emailEncr')."',
'username' => '".Session::get('emailUser')."',
'password' => '".Session::get('emailPass')."',
'sendmail' => '".Session::get('emailSend')."',
);");
			
				// Set the message
				$this->_data->message = lang('setup.config.email.write.failure', App::environment());
				
				// Write the controls
				$this->_controls = Form::open(['url' => 'setup/config/email/verify']).
					Form::button('Re-Test', [
						'class'	=> 'btn btn-primary',
						'id'	=> 'next',
						'name'	=> 'next',
						'type'	=> 'submit',
					]).
					Form::token().
					Form::close();
			}
		}
		else
		{
			// Dump the code to a variable
			$this->_data->code = e("<?php

return array(
'driver' => '".Session::get('emailDrvr')."',
'host' => '".Session::get('emailHost')."',
'port' => ".Session::get('emailPort').",
'encryption' => '".Session::get('emailEncr')."',
'username' => '".Session::get('emailUser')."',
'password' => '".Session::get('emailPass')."',
'sendmail' => '".Session::get('emailSend')."',
);");
		
			// Set the message
			$this->_data->message = lang('setup.config.email.write.failure', App::environment());
			
			// Write the controls
			$this->_controls = Form::open(['url' => 'setup/config/email/verify']).
				Form::button('Verify', [
					'class'	=> 'btn btn-primary',
					'id'	=> 'next',
					'name'	=> 'next',
					'type'	=> 'submit',
				]).
				Form::token().
				Form::close();
		}
	}

	public function getVerify()
	{
		// Set the view
		$this->_view = 'setup/config/email';

		// Set the title and header
		$this->_title = 'Email Setup';
		$this->_header = 'Verify Email Config <small>Email Setup</small>';

		// Set the step
		$this->_data_step = false;

		if (File::exists(APPPATH.'config/'.App::environment().'/mail.php'))
		{
			// Clear the session
			Session::flush();

			// Write the message
			$this->_data->message = lang('setup.config.email.verify.success');
			
			// Write the controls
			$this->_controls = HTML::link('setup', 'Back to Setup Center', ['class' => 'btn btn-primary']);
		}
		else
		{
			$this->_header = 'Email Config File Not Found';
			$this->_data->message = lang('setup.config.email.verify.failure');

			// Write the controls
			$this->_controls = HTML::link('setup/config/email/info', 'Start Over', ['class' => 'btn btn-primary']);
		}
	}

}
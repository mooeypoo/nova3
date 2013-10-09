<?php namespace Nova\Core\Mailers;

use BaseMailer;

class User extends BaseMailer {

	public function created($data)
	{
		// Set the content keys
		$contentKeys = [
			'content' => 'email.content.user_create'
		];

		return $this->send('basic', $data, $contentKeys);
	}

	public function passwordReset($data)
	{
		$contentKeys = [
			'subject'	=> 'email.subject.password_reset',
			'content'	=> 'email.content.password_reset',
		];

		return $this->send('basic', $data, $contentKeys);
	}

}
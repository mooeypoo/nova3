<?php

return array(

	'activate'		=> "activate :0",
	'add' 			=> "add :0",
	'clear'			=> "clear :0",
	'create' 		=> "create :0",
	'deactivate'	=> "deactivate :0",
	'delete' 		=> "delete :0",
	'duplicate'		=> "duplicate :0",
	'edit' 			=> "edit :0",
	'fillout'		=> "fill out :0",
	'go'			=> "go to :0",
	'install'		=> "install :0",
	'manage' 		=> "manage :0",
	'new' 			=> "new :0",
	'remove'		=> "remove :0",
	'search'		=> "search :0",
	'show'			=> "show :0",
	'update' 		=> "update :0",
	'updating'		=> "updating :0",
	'validate'		=> "validation :0",
	'view'			=> "view :0",

	'alert' => array(
		'failure' => array(
			'add' 		=> ":0 addition failed, please try again.",
			'create' 	=> ":0 creation failed, please try again.",
			'delete' 	=> ":0 deletion failed, please try again.",
			'duplicate'	=> ":0 duplication failed, please try again.",
			'install'	=> ":0 installation failed, please try again.",
			'save'		=> ":0 save failed, please try again.",
			'submit'	=> ":0 submission failed, please try again.",
			'update'	=> ":0 update failed, please try again.",
		),
		'success' => array(
			'add' 		=> ":0 added.",
			'create' 	=> ":0 created.",
			'delete' 	=> ":0 deleted.",
			'duplicate'	=> ":0 duplicated.",
			'install'	=> ":0 installed.",
			'save'	 	=> ":0 saved.",
			'sent'		=> ":0 sent.",
			'submit'	=> ":0 submitted.",
			'update' 	=> ":0 updated.",
		),
	),

	'admin' => [
		'arc' => [
			'admin' => [
				'users' => "Be careful not to remove a decision maker from the review.",
			],
			'addComment' => "Enter your :0 on the :1 here",
			'email' => "You can send an email to the applicant to request additional information or tell them about the status of their application. This email will be added to the Review History and will be viewable by all members of the review.",
			'involved' => ":0 involved in this review",
			'voted' => ":0 voted :1 on this application.",
		],

		'catalog' => [
			'deleteUpdates' => "Select the new :0 that users currently using the <strong>:1</strong> :0 will be updated to.",
			'previewImage' => "Preview Image",

			'ranks' => [
				'location' => "This is the name of the directory where the rank set is located. (Rank sets are located in <code>app/assets/common/:0/ranks</code>.)",
				'previewImageHelp' => "The filename of the image you want to use as a preview for this rank set.",
				'blankImage' => "Blank Image",
				'blankImageHelp' => "The filename of the image you want to use for the \"blank\" image on the manifest.",
				'extensionHelp' => "The file extension that all rank set images have.",
				'genreHelp' => "<strong>Warning:</strong> Changing the genre can cause issues with your rank sets. Do so only if you know what you're doing!",
				'pending' => "The rank sets below were found in the appropriate ranks directory and have a QuickInstall file, but haven't been installed yet. To install these ranks and make them available to use, click the :0 icon.",
			],

			'skins' => [
				'location' => "This is the name of the directory where the skin is located. (Skins are located in <code>app/skins</code>.)",
				'previewImageHelp' => "The filename of the image you want to use as a preview for this skin.",
				'pending' => "The skins below were found in the appropriate skins directory and have a QuickInstall file, but haven't been installed yet. To install these skins and make them available to use, click the :0 icon.",
				'updateAvailable' => "An update is ready to be applied for this skin.",
				'menuStyle' => "Menu Style",
				'menuStyleHelp' => "Skins can use the classic Nova style (separate main and sub navigations) or the new dropdown style (combined main and sub navigations with dropdowns).",
				'hasMain' => "Has Main Layout",
				'hasAdmin' => "Has Admin Layout",
				'hasLogin' => "Has Log In Layout",
				'imageUploadHelp' => "Drop your image in the area above to upload it.",
			],
		],

		'content' => [
			'noMode' => "No mode",
		],

		'forms' => [
			'deleteUpdates' => "Select the new :0 that :1 in the :2 :0 will be moved to.",
			'order' => "The order can also be changed by dragging-and-dropping the items on the previous page.",

			'changeFormKey' => "<strong>Warning:</strong> Changing a form key will cause issues with the form and its data.",
			'formViewer' => "FormViewer",
			'useFormViewer' => "Use FormViewer",
			'useFormViewerHelp' => "FormViewer allows users to submit created forms and view the content of submitted forms in one place.",
			'formViewerMessageHelp' => "You can specify instructions to be displayed when creating a new entry for this form through FormViewer.",
			'formViewerDisplay' => "Entries Display Field",
			'formViewerDisplayHelp' => "You can specify the field whose data you want to use for displaying the full list of completed entries in FormViewer. If you don't select one, the date the record was created will be used.",
			'formViewerEmail' => "Email Options",
			'useEmail' => "Send Results in Email",
			'useEmailHelp' => "When a user fills out the form, the results will be emailed to the addresses specified below.",
			'emailAddresses' => "Send Results To",
			'emailAddressesHelp' => "Enter the email addresses you want results sent to seperated by commas.",
			'dataModel' => "Enter the class alias (defined in the application config file) or full model name (with namespace and leading slashes) to the data model for this form. This should only be used for advanced forms that tie in to other database tables.",
			
			'tabLinkId' => "Link IDs are used to link a tab with its content on the page. They must be unique and contain no spaces (camelCase is fine) (e.g. one, html, general, characterThings). This will be generated for you based on the name of the tab, but you can change it to anything you'd like.",

			'fieldRestriction' => "Fields can be restricted so only someone with the selected role(s) can edit the data.",
			'containerClass' => "All fields are wrapped in a container that controls their size. You can use any class that's part of the Bootstrap scaffold. We recommend <code>col-lg-4</code> for text fields and dropdowns and <code>col-lg-8</code> for textareas, though you can use whatever classes you want.",
			'associateField' => "Field Association",
			'associateFieldHelp' => "Form fields can be standalone (the form has no tabs or sections) or can be associated with a tab or section. A tab can contain standalone fields and sections with fields. Any standalone fields in a tab will always be displayed above any of that tab's section(s).",
			'dropdownCreation' => "Enter all values for this dropdown separated by commas.",
			'dropdownUpdate' => "To create a new value for this field, enter the value and click :0. To update a value for this field, change the value and click the :1. To delete a value for this field, click :2 in the row you want to remove.",
			'validation' => "You can set rules for the data entered into the field using any of the rules available in the <a href='http://laravel.com/docs/validation' target='_blank'>Laravel validation documentation</a>. Enter the rules and Nova will validate the data when the form is submitted. (e.g. <code>required|min:5</code>)",
		],

		'ranks' => [
			'changeGroup' => "Select the new :0 group for any :1 currently in this :0 group.",
			'changeInfo' => "Select the new :0 info item for any :1 currently using this :0 info record.",
			'infoGroupExplain' => "Info groups are used solely for presentation purposes.",
		],

		'roles' => [
			'duplicateSysAdminHeader' => "With Great Power Comes Great Responsibility!",
			'duplicateSysAdminText' => "You are about to duplicate the System Administrator role. Make sure you understand the impact of assigning :0 to this role.",
			'removeRole' => "Select the new role you would like any :0 in the :1 role to be moved to.",
			'chooseTaskComponent' => "Start typing to see a list of the existing task components or create your own.",
			'chooseTaskAction' => "Start typing to choose from one of the existing task actions (create, read, update, delete) or create your own.",
			'chooseTaskLevel' => "Task levels can be used to further differentiate access within an action.",
			'inheritedTask' => "Inherited from the <strong>:0</strong> role.",
			'inheritedTaskProcessing' => "Processing inherited role tasks. Please wait...",
		],

		'routes' => [
			'removeConfirm' => "Are you sure you want to delete the :0 <strong>:1</strong>? While this won't remove the custom page, it will revert the route to point back toward the core route. If you want to restore the route to your custom page, you will need to create a new page route.",
			'uri' => "URI parameters are specified with brackets: <code>{id}</code>. Optional URI parameters specified with a trailing question mark: <code>{page?}</code>",
			'resource' => "Resources must include the full namespace: <code>Modules\Anodyne\Controllers\Foo@getMethod</code>",
			'name' => "If you are overriding an existing page, make sure the name matches exactly.",
			'conditions' => "Conditions must contain a name and a pattern, separated by a period: <code>name.condition</code>. The name is the variable used in the URI field and the condition is a regular expression. Ensuring an ID is numeric would be: <code>id.[0-9]+</code>. In addition, you can create multiple conditions for a route by separating the conditions with a pipe <code>|</code>.",
		],

		'users' => [
			'add' => "You can add a new :0 to the system by entering their :1 and :2 and clicking submit. During creation, a :3 will be generated for the :0 and emailed to them. Once the :0 is created, you can associate :4 with their account.",
			'doneSearching' => "Done searching? Head <a href='#' rel='changeUserView' id='showActives'>back</a> to the list of :0 :1.",
			'remove' => "Are you sure you want to remove <strong>:0</strong>? In addition to removing :0, this will also remove all :1 associated with :0. This action is permanent and cannot be undone. Are you sure you want to continue?",
			'removeCharacters' => "The following characters will be removed from the database by deleting this user:",
			'removeAvatar' => "Are you sure you want to remove the :0 avatar for <strong>:1</strong>? This action is permanent and cannot be undone. Are you sure you want to continue?",
			'override' => "Overriding the existing associations will change the ownership of the :0 to the new :1.",
			'link' => "Link :0 to :1",
			'noPrimaryCharacter' => "No primary character assigned",
			'searchPlaceholder' => "Starting typing to search for users",
			'choosePrimaryCharacter' => "You can choose the primary character associated with this user from the dropdown. The dropdown only pulls back unassigned characters (NPCs). If you want to do more advanced assignment, use the User/Character Link Management page.",
			'useGravatar' => "Use Gravatar",
			'useGravatarHelp' => "Nova allows you to create a user avatar for use throughout the system. (An \"avatar\" is an image that represents you online.) You can choose to upload an image to the Nova site or use the Gravatar service. A Gravatar is a Globally Recognized Avatar. You upload it and create your profile just once, and then when you participate in any Gravatar-enabled site, your Gravatar image will automatically follow you there. More information and sign-up is available on the <a href='https://en.gravatar.com/' target='_blank'>Gravatar site</a>.",
			'uploadSize' => "Uploaded images cannot be larger than <strong class='text-info'>:0 MB</strong>.",
		],
	],

	'backToIndex' => 'Back to index',
	'backToSite' => 'Back to site',
	'back' => "Back to :0",
	
	'cancelPasswordReset' => "Cancel password reset",

	'deleteConfirm' => "Are you sure you want to delete the :0 <strong>:1</strong>? This action is permanent and cannot be undone!",

	'duplicateConfirm' => "This will duplicate the :0 <strong>:1</strong>. Are you sure you want to proceed?",

	'forgotPassword' => "Forgot your password?",

	'installConfirm' => "This will install the :0 <strong>:1</strong>. Are you sure you want to proceed?",
	'updateConfirm' => "This will update the :0 <strong>:1</strong>. Are you sure you want to proceed?",

	'javascript' => "You need to have Javascript turned on to use all of Nova 3's features.",

	'join' => array(
		'userInfo' => ":0 information (including :1 and :2) is only viewable by members of the :3 when they are logged in to the site. None of your information can be seen by visitors to the site or anyone who is not logged in.",
		'userFound' => "Your :0 record was found. If you're trying to apply with a new :1, you can continue to the :1 section. If you're trying to re-activate an existing :1, please contact the :2.",
		'userFormReset' => 'Made a mistake? <a href="#" id="userFormReset">Reset the :0 form</a>.',
		'welcomeBack' => "welcome back!",
	),

	'pleaseNote' => "please note",

	'refresh' => "Please refresh the page to view your changes.",

	'selectOne' => "Please select a :0",

	'flash' => array(
		'failure' => ":0 :1 failed, please try again.",
		'success' => ":0 :1!",
	),

	'login' => array(
		'resetSuccess' => "Your password reset was accepted. You'll receive an email shortly with a confirmation link. Once you've confirmed your password reset, your new password will be active.",

		'logout' => "You have successfully logged out. You can return to the <a href=':0'>main page</a> or <a href=':1'>log in</a> again.",
	),

	'help' => array(
		'user_account' => "Edit your user details and bio, change your preferences and request an LOA from your account page"
	),

);
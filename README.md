Mandrill for FuelPHP
================

##Install
	1. Download and put "mandrill" directory in "fuel/packages"
	2. Load "email" & "mandrill" packages in "fuel/app/config/config.php":
	````php
	 'always_load'  => array(
  	   'packages'  => array(
  		    'email',
  			  'mandrill'
  	    )
  	)
	````
	
	3. Edit your "fuel/app/config/email.php" to use "mandrill" driver.
	````php
	 'driver'		=> 'mandrill'
	````	
  	
	4. Copy "mandrill.php" file from "mandrill/config" to "fuel/app/config" and enter API key.
	````php
	 'api_key' => 'your_api_key'
	````	

##Usage
As you would send any email through FuelPHP

````php
$email = Email::forge();

$email->from('my@email.me', 'My Name');
$email->to('receiver@elsewhere.co.uk', 'Johny Squid');
$email->subject('This is the subject');
$email->html_body(\View::forge('email/template', $email_data));

$email->send();
````


##Limitations
* Doesn't support attachments
* TO, CC & BCC are all merged (By default not exposed to "TO" field; Sends individually)

##Credits
* ([Mandril-API-PHP 1.0.13](https://packagist.org/packages/mandrill/mandrill)) 
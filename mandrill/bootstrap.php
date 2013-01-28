<?php


Autoloader::add_classes(array(
	/**
	 * Email class.
	 */
	'Email\\Email_Driver_Mandrill' => __DIR__.'/classes/email/driver/mandrill.php',
    
	'Mandrill' => __DIR__.'/vendor/Mandrill.php',
));

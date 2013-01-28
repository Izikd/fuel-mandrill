<?php
namespace Email;
/**
 * Description of Email_Driver_Mandrill
 *
 * @author Izik
 */
class Email_Driver_Mandrill extends Email_Driver {

    public function __construct(array $config)
    {
	parent::__construct($config);
	
	\Config::load('mandrill', true);
    }
    
    protected function _send()
    {
	$api_key = \Config::get('mandrill.api_key');
	if (empty($api_key))
	{
	    throw new EmailValidationFailedException('Mandrill API key not set');
	}

	$mandrill = new \Mandrill($api_key);
	$message = new \Mandrill_Messages($mandrill);
	
	$message_params = array(
	    'html' => $this->body,
	    'subject' => $this->subject,
	    
	    'from_email' => $this->config['from']['email'],
	    'from_name' => $this->config['from']['name'],
	    
	    'to' => array(),
	    
	    'auto_text' => \Config::get('mandrill.auto_text'),
	    'preserve_recipients' => \Config::get('mandrill.preserve_recipients')
	);
	
	$to = array_merge($this->to, $this->cc, $this->bcc);
	foreach ($to as $key => $value)
	{
	    $message_params['to'][] = array(
		'email' => $key,
		'name' => (!empty($value['name']) ? $value['name'] : '')
	    );
	}
	
	$message->send($message_params, \Config::get('mandrill.async'));
	
	return true;
    }
    
}

?>

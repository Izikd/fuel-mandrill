<?php
namespace Email;
/**
 * Description of Email_Driver_Mandrill
 *
 * @author Izik
 */
class Email_Driver_Mandrill extends Email_Driver {

    private $merge_vars = array();

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
	    'preserve_recipients' => \Config::get('mandrill.preserve_recipients'),
	    
	    'attachments' => array(),
	    'merge_vars' => array()
	);
	
	$to = array_merge($this->to, $this->cc, $this->bcc);
	foreach ($to as $key => $value)
	{
	    $message_params['to'][] = array(
		'email' => $key,
		'name' => (!empty($value['name']) ? $value['name'] : '')
	    );
	}
	
	// Attachments
	foreach ($this->attachments['attachment'] as &$file)
	{
	    $name = substr($file['cid'], 4); // remove cid
	    
	    $message_params['attachments'][] = array(
		'type' => $file['mime'],
		'name' => $name,
		'content' => $file['contents']
	    );
	}
		
	// Merge Vars
	foreach ($this->merge_vars as $email => &$vars)
	{
	    $email_vars = array();
	    foreach ($vars as $key => $value)
	    {
		$email_vars[] = array(
		    'name' => $key,
		    'content' => $value
		);
	    }
	    
	    $message_params['merge_vars'][] = array(
		'rcpt' => $email,
		'vars' => $email_vars
	    );
	}
		
	$message->send($message_params, \Config::get('mandrill.async'));
	
	return true;
    }
    
    public function attach($file, $inline = false, $cid = null, $mime = null, $name = null)
    {
	parent::attach($file, false, $cid, $mime, $name);
    }
    
    public function set_merge_var($email, $var_name, $value)
    {
	if (!isset($this->merge_vars[$email]))
	{
	    $this->merge_vars[$email] = array();
	}

	$this->merge_vars[$email][$var_name] = $value;
    }
    
}

?>

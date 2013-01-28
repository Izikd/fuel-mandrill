<?php
/**
 * Mandril config
 * 
 * Docs partly taken from:
 * https://mandrillapp.com/api/docs/messages.html
 */

return array(

    'api_key' => '',			// a valid API key
    
    'async' => true,			// enable a background sending mode that is optimized for bulk sending. 
					// In async mode, messages/send will immediately return a status of "queued" for every recipient.
					// To handle rejections when sending in async mode, set up a webhook for the 'reject' event.
					// Defaults to false for messages with no more than 10 recipients; messages with more than 10 recipients are always sent asynchronously, regardless of the value of async. 
    
    'auto_text' => true,		// whether or not to automatically generate a text part for messages that are not given text 
    'preserve_recipients' => false	// whether or not to expose all recipients in to "To" header for each email
    

);

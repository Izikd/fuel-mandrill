<?php
/**
 * Fuel Mandrill
 *
 * @package 	Fuel
 * @subpackage	Mandrill
 * @version		1.0
 * @author 		Izikd
 * @see 		https://mandrillapp.com/api/docs/messages.html
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */

return array(

	/**
	 * A valid API key
	 */
    'api_key' => '',

    /**
     * Enable a background sending mode that is optimized for bulk sending.
     *
     * In async mode, messages/send will immediately return a status of "queued" for every recipient.
     * To handle rejections when sending in async mode, set up a webhook for the 'reject' event.
     * Defaults to false for messages with no more than 10 recipients; messages with more than 10 recipients are always sent asynchronously, regardless of the value of async.
     */
    'async' => true,

    /**
     * Whether or not to automatically generate a text part for messages that are not given text
     */
    'auto_text' => true,

    /**
     * Whether or not to expose all recipients in to "To" header for each email
     */
    'preserve_recipients' => false
);

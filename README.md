Mandrill for FuelPHP
====================

[Mandrill](http://mandrill.com/) is a new way for apps to send transactional email.
It runs on the delivery infrastructure that powers MailChimp.

Allows to send up to 12k free emails per month.

## Install

1. Via Composer

``` json
{
    "require": {
        "izikd/fuel-mandrill": "dev-master"
    }
}
```

2. Load `email` & `mandrill` packages in `config/config.php`

``` php
'always_load'  => array(
    'packages'  => array(
        'email',
        'mandrill',
    )
)
```

3. Edit your `config/email.php` file to use `mandrill` driver.

``` php
'driver' => 'mandrill'
```

4. Copy `mandrill/config/mandrill.php` file to `config/` and enter your Mandrill API key.

``` php
'api_key' => 'your_api_key'
```

## Usage

As you would send any email through FuelPHP.

``` php
$email = Email::forge();

$email->from('my@email.me', 'My Name');
$email->to('receiver@elsewhere.co.uk', 'Johny Squid');
$email->subject('This is the subject');
$email->html_body(\View::forge('email/template', $email_data));

$email->send();
```


## Limitations
* Doesn't support attachments
* TO, CC & BCC are all merged (By default not exposed to "TO" field; Sends individually)

## Credits
* [Mandril-API-PHP  1.0.50](https://packagist.org/packages/mandrill/mandrill)
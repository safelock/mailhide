# mailhide
A fork of hanshuo/mailhide2, this project attempts to expand to allow simultaneous implementations of various captchas to reveal emails.

It is implemented in PHP, which means it unfortunately does not work natively on Github Pages alone.

## Usage

1. [Sign up](http://www.google.com/recaptcha/admin) for your own reCAPTCHA key from Google. Both regular and invisible keys are supported.
2. Replace `<site_key>` in `email.html` (`email_invisible.html` for invisible reCAPTCHA) and the appropiate secret key in `config.php` with your own. 
3. Put `email.html` and `email.php` under the same directory on your website.
4. Include a link to `email.html` in the web page where your masked email address is shown.

## How do I add emails?
A key should be generated per email you wish to protect. These can be added to the config.php file under the array $configEmailAddress.
The format is (per line): `'key' => 'email',`.

## How do I link to emails?
Each link will use the same html files, however a query string is used to show which email.
This query string has the key "mailKey", and the key should match that in the config.php.
So the URL Format should look like: https://example.org/mailhide/email.html?mailKey=EXAMPLEKEY

